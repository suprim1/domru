<?php

use yii\db\Migration;

class m161007_201449_create_plans_table extends Migration
{
   public function up() 
    {
        $this->createTable('plans', [
            'PLAN_ID' => 'integer(11) NOT NULL PRIMARY KEY',
			'PLAN_NAME' => 'string(255) NOT NULL',
	  		'PLAN_GROUP_ID' => 'integer(11) NOT NULL',
			'ACTIVE_FROM' => 'date NOT NULL',
			'ACTIVE_TO' => 'date',
			'COMPANY_ID' => 'integer(11)'
        ]);
	}

    public function down()
    {
        $this->dropTable('plans');
    }
}
