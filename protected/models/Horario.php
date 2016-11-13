<?php

/**
 * This is the model class for table "horario".
 *
 * The followings are the available columns in table 'horario':
 * @property integer $idHorario
 * @property string $horaInicio
 * @property string $horaFin
 * @property integer $dia
 * @property integer $idCurso
 *
 * The followings are the available model relations:
 * @property Curso $idCurso0
 */
class Horario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'horario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCurso', 'required'),
			array('dia, idCurso', 'numerical', 'integerOnly'=>true),
			array('horaInicio, horaFin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idHorario, horaInicio, horaFin, dia, idCurso', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idCurso0' => array(self::BELONGS_TO, 'Curso', 'idCurso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idHorario' => 'Id Horario',
			'horaInicio' => 'Hora Inicio',
			'horaFin' => 'Hora Fin',
			'dia' => 'Dia',
			'idCurso' => 'Curso',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idHorario',$this->idHorario);
		$criteria->compare('horaInicio',$this->horaInicio,true);
		$criteria->compare('horaFin',$this->horaFin,true);
		$criteria->compare('dia',$this->dia);
		$criteria->compare('idCurso',$this->idCurso);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Horario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
