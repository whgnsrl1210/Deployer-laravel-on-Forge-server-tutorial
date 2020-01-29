@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">조훈기의 라라벨 포트폴리오 입니다</div>

                <div class="card-body">
                    <ul style="color:steelblue"><h3>이 게시판은 아래와 같은 기능이 있습니다.</h3>
                        <br>
                        <li><h4>사용자 로그인</h4></li>
                        <li><h4>회원가입</h4></li>
                        <li><h4>비밀번호 분실 요청</h4></li>
                        <li><h4>회원 이메일 인증</h4></li> 
                        <li><h4>글 생성,수정,삭제</h4></li> 
                        <li><h4>댓글 생성,수정,삭제</h4></li>  
                    </ul>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
