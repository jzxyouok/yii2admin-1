<?php

namespace backend\controllers;

use backend\models\Order;
use backend\models\search\OrderSearch;
use backend\models\Shop;
use backend\models\Train;
use common\helpers\ArrayHelper;
use common\helpers\FuncHelper;
use common\models\TrainCertificate;
use Yii;


/*
 * 订单控制器
 * 作者 ：longfei
 * Email ：phphome@qq.com
 */
class OrderController extends BaseController
{
    /*
     * ---------------------------------------
     * 列表页
     * ---------------------------------------
     */
    public function actionIndex()
    {
        /* 添加当前位置到cookie供后续跳转调用 */
        $this->setForward();//phpinfo();

        $params = Yii::$app->request->getQueryParams();

        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($params); //var_dump($dataProvider->query->all());exit();
        if (isset($params['action']) && $params['action'] == 'export') {
            $this->export($dataProvider->query->all());
            return false;
        }

        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /*
     * ---------------------------------------
     * 添加
     * ---------------------------------------
     */
    public function actionAdd(){
        $model = new Order();
        $type = Yii::$app->request->get('type','shop');
        if (Yii::$app->request->isPost) {
            
            $data = Yii::$app->request->post('Order');
            $data['order_money'] && $data['total'] = $data['order_money'];
            $data['create_time'] = time();
            $data['type'] = $type;
            $data['start_time'] = strtotime($data['start_time']);
            $data['end_time'] = strtotime($data['end_time']);
            $data['pay_time'] = time();
            if ($type == 'shop') {
                $shang = Shop::info($data['aid']);
                $data['title'] = $shang['title'];
            } else {
                $id_arr = explode('-', $data['aid']);
                $data['cid'] = $id_arr[0];
                $data['aid'] = $id_arr[1];
                $shang = Train::info($data['aid']);
                $centif = TrainCertificate::getInfo($id_arr[0]);
                $data['title'] = $centif['title'].$shang['title'];
            }
            /* 格式化extend值，为空或数组序列化 */
            if (isset($data['extend'])) {
                $tmp = FuncHelper::parse_field_attr($data['extend']);
                if (is_array($tmp)) {
                    $data['extend'] = serialize($tmp);
                }else{
                    $data['extend'] = '';
                }
            }
            /* 表单数据加载、验证、数据库操作 */
            if ($this->addRow('\backend\models\Order', $data)) {
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('操作错误');
            }
        }

        /* 获取模型默认数据 */
        $model->loadDefaultValues();
        $model->order_sn = strtoupper(substr($type,0,1)).time().rand(1000,9999);
        $model->pay_type = 4;
        $model->pay_source = 3;
        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /*
     * ---------------------------------------
     * 编辑
     * ---------------------------------------
     */
    public function actionEdit(){
        $id = Yii::$app->request->get('id',0);

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post('Order');//print_r($data);exit();
            $data['order_money'] && $data['total'] = $data['order_money'];
            $data['update_time'] = time();
            $data['id'] = $id;
            $data['start_time'] = strtotime($data['start_time']);
            $data['end_time']  = strtotime($data['end_time']);
            $data['pay_time']  = strtotime($data['pay_time']);
            /* 格式化extend值，为空或数组序列化 */
            if (isset($data['extend'])) {
                $tmp = FuncHelper::parse_field_attr($data['extend']);
                if (is_array($tmp)) {
                    $data['extend'] = serialize($tmp);
                }else{
                    $data['extend'] = '';
                }
            }
            $model = Order::findOne($id);
            if($model->aid != $data['aid']) {
                if ($model->type == 'shop') {
                    $shang = Shop::info($data['aid']);
                    $data['title'] = $shang['title'];
                } else {
                    $id_arr = explode('-', $data['aid']);
                    $data['cid'] = $id_arr[0];
                    $data['aid'] = $id_arr[1];
                    $shang = Train::info($data['aid']);
                    $centif = TrainCertificate::getInfo($id_arr[0]);
                    $data['title'] = $centif['title'] . $shang['title'];
                }
            }
            /* 表单数据加载、验证、数据库操作 */
            if ($this->editRow('\backend\models\Order', 'id', $data)) {
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('操作错误');
            }
        }
        $model = Order::findOne($id);
        $model->start_time = date('Y-m-d H:i',$model->start_time);
        $model->end_time   = date('Y-m-d H:i',$model->end_time);
        if($model->type == 'train')
        $model->aid= $model->cid.'-'.$model->aid;
        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /*
     * ---------------------------------------
     * 删除或批量删除
     * ---------------------------------------
     */
    public function actionDelete(){
        if($this->delRow('\backend\models\Order', 'id')){
            $this->success('删除成功', $this->getForward());
        } else {
            $this->error('删除失败！');
        }
    }

    /*
     * ---------------------------------------
     * 导出excel
     * ---------------------------------------
     */
    public function export($data){
        /*$data = Order::find()->where(['pay_status' => 1])
            ->andWhere(['status'=>1])
            ->orderBy('order_id DESC')
            ->asArray()->all();*/
        $arr = [];
        $title = ['order_id','订单号','用户ID','姓名','电话','身份证','商品类型','套餐ID','商品ID','商品名','起租时间','退租时间',
            '数量','价格','支付状态','支付时间','支付类型','支付途径','下单时间','状态'];
        if ($data) {
            foreach ($data as $key => $value) {
                $arr[$key] = $value;
                $arr[$key]['start_time'] = date('Y-m-d H:i', $value['start_time']);
                $arr[$key]['end_time'] = date('Y-m-d H:i', $value['end_time']);
                $arr[$key]['pay_time'] = $value['pay_time'] ? date('Y-m-d H:i', $value['end_time']):0;
                $arr[$key]['create_time'] = $value['create_time'] ? date('Y-m-d H:i', $value['create_time']):0;
                $arr[$key]['pay_status'] = Yii::$app->params['pay_status'][$value['pay_status']];
                $arr[$key]['pay_type'] = Yii::$app->params['pay_type'][$value['pay_type']];
                $arr[$key]['pay_source'] = Yii::$app->params['pay_source'][$value['pay_source']];
                $arr[$key]['status'] = '订单正常';
            }
        }

        FuncHelper::exportexcel($arr,$title);
    }

}
