<?php

namespace frontend\controllers;

use Yii;
use common\models\Program;
use common\models\ProgramPartner;
use common\models\OrganizationProgram;
use common\models\OrganizationProgramType;
use common\models\Email;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\httpclient\Client;





class DashboardController extends \yii\web\Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['index', 'programs'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
//        Yii::$app->mailer->compose()
//            ->setFrom('atinekvatsa@gmail.com')
//            ->setTo('atinekdubey@gmail.com')
//            ->setSubject('Message subject')
//            ->setTextBody('Plain text content')
//            ->setHtmlBody('<b>HTML content</b>')
//            ->send();
        return $this->redirect(['dashboard/programs']);
    }

    public function actionPrograms() 
    {
        $currentUser = Yii::$app->user->identity;
        $userDetails = Yii::$app->user->identity;
        
        if($userDetails->organization->Status == 2)
        {
            return $this->redirect(['organization/declined']);
        }
        $orgId = $currentUser->Organization_Id;
        
        $partnerType = OrganizationProgramType::find()->where(['Organization_Id' => $orgId])->all();
        
        $partnerType = ArrayHelper::map($partnerType, 'Partner_Type_Id', 'Partner_Type_Id');
        $programId = ProgramPartner::find()->where(['Partner_Type_Id' => $partnerType])->all();
        $programIds = ArrayHelper::map($programId, 'Program_Id', 'Program_Id');
        
        $programs = Program::find()->where(['Program_Id' => $programIds, 'Is_Active' => 1])->all();
        $model = new OrganizationProgram();
        $orgId = $currentUser['Organization_Id'];
        $UsrId = $currentUser['User_Id'];
        $applied =  OrganizationProgram::find()->where(['Organization_Id'=>$orgId,  ])->all();
        
        
        $request = Yii::$app->request->post();
        if ($model->load(Yii::$app->request->post())) 
        {
            $boardProgram = !empty($request['OrganizationProgramBoard']['Program_Id']) ? $request['OrganizationProgramBoard']['Program_Id'] : '';
            $staffProgram = !empty($request['OrganizationProgramStaff']['Program_Id']) ? ($request['OrganizationProgramStaff']['Program_Id']) : '';
            $otherProgram = !empty($request['OrganizationProgramOther']['Program_Id']) ? $request['OrganizationProgramOther']['Program_Id'] : '';
            /**
             * Email Notification  to Admin
             */
            $email = [];
            $email['slug'] = 'program-application';
//            $email['{{email}}'] = $currentUser->organization->Email;
            $email['{{npo}}'] = $currentUser->organization->Organization_Name;
            $email['{{email}}'] = Yii::$app->params['adminEmail'];
            $appliedProgram = '';        
            /**
             * Board Based Program
             */
            if(!empty($boardProgram))
            {
                
                foreach($boardProgram as $programId)
                {
                    
                    $model = new OrganizationProgram();
                    $model->Organization_Id = $orgId;
                    $model->Created_By = $UsrId;
                    $model->Program_Id = $programId;
                    $appliedProgram .= ($model->program->Program_Name).',';
                    $model->Year = date('Y');
                    $model->Is_Approved = 0;
                    $model->Created_Date = date('Y-m-d H:i:s');
                    $model->Last_Modified_Date = date('Y-m-d H:i:s');
                    if(!$model->save())
//                    if(0)
                    {
                        Yii::$app->session->setFlash('error', 'Something went wrong. Please contact administrator!');
                        return $this->redirect(['dashboard/programs']);
                    }
                }
                
            }
            
            /**
             * Staff Based Program
             */
            if(!empty($staffProgram))
            {
                
                foreach($staffProgram as $programId)
                {
                    
                    $model = new OrganizationProgram();
                    $model->Organization_Id = $orgId;
                    $model->Created_By = $UsrId;
                    $model->Program_Id = $programId;
                    $appliedProgram .= ($model->program->Program_Name).',';
                    $model->Year = date('Y');
                    $model->Is_Approved = 0;
                    $model->Created_Date = date('Y-m-d H:i:s');
                    $model->Last_Modified_Date = date('Y-m-d H:i:s');
                    if(!$model->save())
//                    if(0)
                    {
                        Yii::$app->session->setFlash('error', 'Something went wrong. Please contact administrator!');
                        return $this->redirect(['dashboard/programs']);
                    }
                }
            }
            /**
             * Other Program
             */
            if(!empty($otherProgram))
            {
                
                foreach($otherProgram as $programId)
                {
                    
                    $model = new OrganizationProgram();
                    $model->Organization_Id = $orgId;
                    $model->Created_By = $UsrId;
                    $model->Program_Id = $programId;
                    $appliedProgram .= ($model->program->Program_Name).',';
                    $model->Year = date('Y');
                    $model->Is_Approved = 0;
                    $model->Created_Date = date('Y-m-d H:i:s');
                    $model->Last_Modified_Date = date('Y-m-d H:i:s');
                    if(!$model->save())
//                    if(0)
                    {
                        Yii::$app->session->setFlash('error', 'Something went wrong. Please contact administrator!');
                        return $this->redirect(['dashboard/programs']);
                    }
                }
            }
            Yii::$app->session->setFlash('success', 'Thank you!');
            $email['{{programs}}'] = $appliedProgram;
            $mail = new Email();
            $mail = $mail->sendEmail($email);
            
            return $this->redirect(['dashboard/programs']);
            
        }

        return $this->render('programs', [
                    'programs' => $programs,
                    'model'    => $model,
                    'applied'    => $applied,
        ]);
    }
    
    

}
