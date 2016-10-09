<?php

namespace app\commands;

use yii\console\Controller;
use Yii;




class GoController extends Controller
{
	public function actionIndex()
    { 
		$Connection = Yii::$app->db;
		$Connection->open(); 
	   if (file_exists('xml/plans.xml'))
		 {
			$xml = simplexml_load_file('xml/plans.xml');
			foreach($xml->result->ROWSET[0]->ROW as $row)
			{	
				
				$ACTIVE_FROM=date_create_from_format('d-M-y', $row->ACTIVE_FROM);
				if ($row->ACTIVE_TO=="" || $ACTIVE_TO>=date(Y-m-d))
				{
					if ($row->ACTIVE_TO!="")
					{
						$ACTIVE_TO=date_create_from_format('d-M-y', $row->ACTIVE_TO);
						$ACTIVE_TO=date_format($ACTIVE_TO, 'Y-m-d');
					}
					$Connection->createCommand()->insert('plans',[
					'PLAN_ID'=>$row->PLAN_ID,
					'PLAN_NAME'=>$row->PLAN_NAME,
					'PLAN_GROUP_ID'=>$row->PLAN_GROUP_ID,
					'ACTIVE_FROM'=>date_format($ACTIVE_FROM, 'Y-m-d'),
					'ACTIVE_TO'=>$ACTIVE_TO,
					'COMPANY_ID'=>$row->COMPANY_ID,])->execute();
				}
			}
		}
		if (file_exists('xml/plans.xml'))
		 {
			$xml = simplexml_load_file('xml/plan_properties.xml');
			foreach($xml->result->ROWSET[0]->ROW as $row)
			{	
				
				$ACTIVE_FROM=date_create_from_format('d-M-y', $row->ACTIVE_FROM);
				if ($row->ACTIVE_TO=="" || $ACTIVE_TO>=date(Y-m-d))
				{
					if ($row->ACTIVE_TO!="")
					{
						$ACTIVE_TO=date_create_from_format('d-M-y', $row->ACTIVE_TO);
						$ACTIVE_TO=date_format($ACTIVE_TO, 'Y-m-d');
					}
					$Connection->createCommand()->insert('plan_properties',[
					'PROPERTY_ID'=>$row->PROPERTY_ID,
					'PROPERTY_TYPE_ID'=>$row->PROPERTY_TYPE_ID,
					'ACTIVE_FROM'=>date_format($ACTIVE_FROM, 'Y-m-d'),
					'ACTIVE_TO'=>$ACTIVE_TO,
					'PLAN_ID'=>$row->PLAN_ID,
					'PROP_VALUE'=>$row->PROP_VALUE,])->execute();
				}
			}
		}
	}
}





