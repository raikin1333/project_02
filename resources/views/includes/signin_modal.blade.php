<!-- Modal -->
<div class="modal fade" id="signinModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="width:500px; height:150px;">

            <div class="modal-header">
                <h5 class="modal-title ms-2" id="staticBackdropLabel">Sign in</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body d-flex align-items-center justify-content-center">
                <!-- ボタンを表示 -->
                <button id="googleSignIn" class="btn btn-block btn-outline-secondary" style="width: 300px; height: 40px;">
                    <svg aria-hidden="true" class="native svg-icon iconGoogle" width="18" height="18" viewBox="0 0 18 18"><path d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 002.38-5.88c0-.57-.05-.66-.15-1.18z" fill="#4285F4"></path><path d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 01-7.18-2.54H1.83v2.07A8 8 0 008.98 17z" fill="#34A853"></path><path d="M4.5 10.52a4.8 4.8 0 010-3.04V5.41H1.83a8 8 0 000 7.18l2.67-2.07z" fill="#FBBC05"></path><path d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 001.83 5.4L4.5 7.49a4.77 4.77 0 014.48-3.3z" fill="#EA4335"></path></svg>
                    Sign in with Google
                </button>
                
                <!-- ライブラリのロード -->
                <script src="https://apis.google.com/js/platform.js?onload=googleCallBack" async defer></script>

                <script>
                    function googleCallBack(){
                        gapi.load('auth2', function() {
                        auth2 = gapi.auth2.init({
                            client_id: '準備編で取得したクライアントID',
                            cookiepolicy: 'single_host_origin',
                            scope: 'profile'
                        });
                    
                        auth2.attachClickHandler(element, {},
                            function(googleUser) {
                            console.log('Signed in: ' + googleUser.getBasicProfile().getName());
                    
                            // トークンの取得（サーバーにはこちらを送信）
                            var id_token = googleUser.getAuthResponse().id_token;
                    
                            // 接続を解除して、2回目以降の自動ログインを防止
                            var auth2 = gapi.auth2.getAuthInstance();
                            auth2.disconnect();
                    
                            // 5.サーバへ送信
                            var xhr = new XMLHttpRequest();
                    
                            // open()で指定するのは、サーバ側のURL
                            xhr.open('POST', 'https://example.com/server-side.php');
                            xhr.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded');
                    
                            // 処理が終わった後に呼ばれるコールバック
                            xhr.onload = function() {
                                if(xhr.readyState == 4 && xhr.status == 200 && response){
                                // ログイン完了後にリダイレクト
                                window.location.href = 'https://example.com';
                                }
                                else{
                                console.log('エラー');
                                }
                            };
                            xhr.send('idtoken=' + id_token);

                            }, function(error) {
                            console.log('Sign-in error', error);
                            }
                        );
                        });
                    
                        element = document.getElementById('googleSignIn');
                    }
                </script>
            </div>

            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div> -->
            
        </div>
    </div>
</div>