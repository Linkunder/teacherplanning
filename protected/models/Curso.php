<?php

/**
 * This is the model class for table "Curso".
 *
 * The followings are the available columns in table 'Curso':
 * @property integer $idCurso
 * @property string $nombre
 * @property string $institucion
 * @property integer $idProfesor
 *
 * The followings are the available model relations:
 * @property Alumno[] $alumnos
 * @property Clase[] $clases
 * @property Profesor $idProfesor0
 * @property Evaluacion[] $evaluacions
 * @property Horario[] $horarios
 */
class Curso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Curso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idProfesor', 'required'),
			array('idProfesor', 'numerical', 'integerOnly'=>true),
			array('nombre, institucion', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCurso, nombre, institucion, idProfesor', 'safe', 'on'=>'search'),
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
			'alumnos' => array(self::HAS_MANY, 'Alumno', 'idCurso'),
			'clases' => array(self::HAS_MANY, 'Clase', 'idCurso'),
			'idProfesor0' => array(self::BELONGS_TO, 'Profesor', 'idProfesor'),
			'evaluacions' => array(self::HAS_MANY, 'Evaluacion', 'idCurso'),
			'horarios' => array(self::HAS_MANY, 'Horario', 'idCurso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCurso' => 'Id Curso',
			'nombre' => 'Nombre',
			'institucion' => 'Institución',
			'idProfesor' => 'Profesor',
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

		$criteria->compare('idCurso',$this->idCurso);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('institucion',$this->institucion,true);
		$criteria->compare('idProfesor',$this->idProfesor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Curso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
