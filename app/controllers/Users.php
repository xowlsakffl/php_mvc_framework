<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        $data = [
            'email' => '',
            'name' => '',
            'password' => '',
            'passwordConfirm' => '',
            'emailError' => '',
            'nameError' => '',
            'passwordError' => '',
            'passwordConfirmError' => '',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //데이터 필터링
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'name' => trim($_POST['name']),
                'password' => trim($_POST['password']),
                'passwordConfirm' => trim($_POST['passwordConfirm']),
                'emailError' => '',
                'nameError' => '',
                'passwordError' => '',
                'passwordConfirmError' => '',
            ];

            //이메일 유효성 검사
            if(empty($data['email'])){
                $data['emailError'] = '이메일을 입력해주세요.';
            }else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['emailError'] = '올바른 형식의 이메일 주소를 입력해주세요.';
            } else{
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['emailError'] = '이미 존재하는 이메일입니다.';
                }
            }

            //이름 유효성 검사
            if(empty($data['name'])){
                $data['nameError'] = '이름을 입력해주세요.';
            } else if(!preg_match('/^[a-zA-Zㄱ-ㅎㅏ-ㅣ가-힣]*$/', $data['name'])){
                $data['nameError'] = '올바른 형식의 이름을 입력해주세요.';
            }

            //비밀번호 유효성 검사
            if(empty($data['password'])){
                $data['passwordError'] = '비밀번호를 입력해주세요.';
            }else if(strlen($data['password']) < 6){
                $data['passwordError'] = '최소 8자 이상 입력해주세요.';
            }else if(!preg_match("/^(.{0,7}|[^a-z]*|[^\d]*)$/i", $data['password'])){
                $data['passwordError'] = '1자 이상의 숫자를 입력해주세요.';
            }

            //비밀번호 확인
            if(empty($data['passwordConfirm'])){
                $data['passwordConfirmError'] = '비밀번호를 입력해주세요.';
            }else{
                if($data['password'] != $data['passwordConfirm']){
                    $data['passwordConfirmError'] = '비밀번호가 일치하지 않습니다.';
                }
            }

            if(empty($data['emailError']) && empty($data['nameError']) && empty($data['passwordError']) && empty($data['passwordConfirmError'])){
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if($this->userModel->register($data)){
                    header('location: '.URLROOT.'/users/login');
                }else{
                    die('Something went wrong.');
                }
            }
        }

        $this->view('users/register', $data);
    }

    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'emailError' => '',
                'passwordError' => ''
            ];

            if(empty($data['email'])){
                $data['emailError'] = '이메일을 입력해주세요.';
            }else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['emailError'] = '올바른 형식의 이메일 주소를 입력해주세요.';
            }

            if(empty($data['password'])){
                $data['passwordError'] = '비밀번호를 입력해주세요.';
            }

            if(empty($data['emailError']) && empty($data['passwordError'])){
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['passwordError'] = '이메일 또는 비밀번호가 일치하지 않습니다.';

                    $this->view('users/login', $data);
                }
            }
        }else{
            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => '',
            ];
        }

        $this->view('users/login', $data);
    }

    public function createUserSession($user){
        session_start();

        $_SESSION['udx'] = $user->udx;
        $_SESSION['email'] = $user->email;
        header('location:'.URLROOT);
    }

    public function logout(){
        unset($_SESSION['udx']);
        unset($_SESSION['email']);
        header('location:'.URLROOT);
    }
}