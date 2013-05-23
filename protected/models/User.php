<?php 

class User extends CActiveRecord
{
    // �������� �����������
    const SCENARIO_SIGNUP = 'signup';

    // ��������� ������ ����� ��������, �.�. ����� ���� ��� � ��
    public $password_repeat;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'user';
    }

    // ������� �������� �������� ������
    public function rules()
    {
        return array(
            // ����� � ������ - ������������ ����
            array('login, password', 'required'),
            // ����� ������ ������ ���� � �������� �� 5 �� 30 ��������
            array('login', 'length', 'min'=>5, 'max'=>30),
            // ����� ������ ��������������� �������
            array('login', 'match', 'pattern'=>'/^[A-z][\w]+$/'),
            // ����� ������ ���� ����������
            array('login', 'unique'),
            // ����� ������ �� ����� 6 ��������
            array('password', 'length', 'min'=>6, 'max'=>30),
            // ��������� ������ � ����� ����������� ��� �������� �����������
            array('password_repeat, email', 'required', 'on'=>self::SCENARIO_SIGNUP),
            // ����� ���������� ������ �� ����� 6 ��������
            array('password_repeat', 'length', 'min'=>6, 'max'=>30),
            // ������ ������ ��������� � ��������� ������� ��� �������� �����������
            array('password', 'compare', 'compareAttribute'=>'password_repeat', 'on'=>self::SCENARIO_SIGNUP),
            // ����� ����������� �� ������������ ����
            array('email', 'email', 'on'=>self::SCENARIO_SIGNUP),
            // ����� ������ ���� � �������� �� 6 �� 50 ��������
            array('email', 'length', 'min'=>6, 'max'=>50),
            // ����� ������ ���� ����������
            array('email', 'unique'),
            // ����� ������ ���� �������� � ������ ��������
            array('email', 'filter', 'filter'=>'mb_strtolower'),
        );
    }

    // ����� ���������
    public function attributeLabels()
    {
        return array(
            'login' => '�����',
            'password' => '������',
            'password_repeat' => '��������� ������',
            'email' => 'e-mail',
        );
    }

    // �����, ������� ����� ���������� �� ���������� ������ � ��
    protected function beforeSave()
    {
         if(parent::beforeSave())
         {
            if($this->isNewRecord)
            {
                // ����� �����������
                $this->dtime_registration = time();
                // ���������� ������
                $this->password = $this->hashPassword($this->password);
            }

            return true;
         }

        return false;
    }

    public function hashPassword($password)
    {
        return md5($password);
    }
}