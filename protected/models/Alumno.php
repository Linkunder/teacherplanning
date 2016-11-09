<?php

/**
 * This is the model class for table "Alumno".
 *
 * The followings are the available columns in table 'Alumno':
 * @property integer $idAlumno
 * @property string $rut
 * @property string $nombre
 * @property string $apellido
 * @property string $mail
 * @property string $sexo
 * @property integer $idCurso
 *
 * The followings are the available model relations:
 * @property Curso $idCurso0
 * @property Evaluacion[] $evaluacions
 * @property Anotacion[] $anotacions
 * @property Clase[] $clases
 */
class Alumno extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Alumno';
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
			array('idCurso', 'numerical', 'integerOnly'=>true),
			array('rut, nombre, apellido, mail', 'length', 'max'=>45),
			array('sexo', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idAlumno, rut, nombre, apellido, mail, sexo, idCurso', 'safe', 'on'=>'search'),
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
			'evaluacions' => array(self::MANY_MANY, 'Evaluacion', 'AlumnoRindeEvaluacion(idAlumno, idEvaluacion)'),
			'anotacions' => array(self::HAS_MANY, 'Anotacion', 'idAlumno'),
			'clases' => array(self::MANY_MANY, 'Clase', 'Asistencia(idAlumno, idClase)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAlumno' => 'Id Alumno',
			'rut' => 'Rut',
			'nombre' => 'Nombre',
			'apellido' => 'Apellidos',
			'mail' => 'Mail',
			'sexo' => 'Sexo',
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

		$criteria->compare('idAlumno',$this->idAlumno);
		$criteria->compare('rut',$this->rut,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('idCurso',$this->idCurso);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Alumno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
