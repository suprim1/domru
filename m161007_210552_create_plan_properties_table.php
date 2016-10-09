<?php

use yii\db\Migration;

/**
 * Handles the creation for table `plan_properties`.
 */
class m161007_210552_create_plan_properties_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up() 
    {
        $this->createTable('plan_properties', [
            'PROPERTY_ID' => 'integer(11) NOT NULL PRIMARY KEY',
			'PROPERTY_TYPE_ID' => 'integer(11) NOT NULL',
	  		'ACTIVE_FROM' => 'date NOT NULL',
			'ACTIVE_TO' => 'date',
			'PLAN_ID' => 'integer(11) NOT NULL',
			'PROP_VALUE' => 'string(255) NOT NULL',
        ]);
		$this->addForeignKey('PLAN_ID_FK', 'plan_properties', 'PLAN_ID', 'plans', 'PLAN_ID');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('plan_properties');
    }
}
