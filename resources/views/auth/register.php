<?php $title = 'Register' ?>
<?php ob_start()?>   
    <video autoplay loop muted id="video-background">
        <source src="<?= urlpath('images/login.mp4') ?>" type="video/mp4">
        <!-- Tambahkan sumber video lainnya jika diperlukan -->
    </video>
    <div class="gradient-bg flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 bg-gray-900 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
            <h2 class="text-4xl font-bold text-white text-center mb-8">Register</h2>
            <form action="<?= urlpath('register') ?>" method="POST" id="registerForm">
                <div class="mb-6 relative">
                    <label for="username" class="block text-sm font-medium text-gray-400">Name</label>
                    <div class="relative">
                        <input type="text" id="username" name="username" required class="mt-1 px-4 py-2 w-full rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.94 6.34a.75.75 0 01.02 1.06l-.02.02-.93.94h4.94a.75.75 0 010 1.5H2l.94.94a.75.75 0 11-1.06 1.06l-2.25-2.25a.75.75 0 010-1.06L1.88 6.34a.75.75 0 011.06.02zm12.12 0a.75.75 0 00-1.06 1.06l.94.94H8a.75.75 0 000 1.5h6.94l-.94.94a.75.75 0 001.06 1.06l2.25-2.25a.75.75 0 000-1.06l-2.25-2.25z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="mb-6 relative">
                    <label for="email" class="block text-sm font-medium text-gray-400">Email</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" required class="mt-1 px-4 py-2 w-full rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm2-1a1 1 0 00-1 1v.5L10 9l7-3.5V5a1 1 0 00-1-1H4zm13 3l-6.5 3.25L4 7v8a1 1 0 001 1h12a1 1 0 001-1V7z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="mb-6 relative">
                    <label for="password" class="block text-sm font-medium text-gray-400">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required class="mt-1 px-4 py-2 w-full rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a6 6 0 00-6 6v3H3.5a1.5 1.5 0 100 3h13a1.5 1.5 0 100-3H16V8a6 6 0 00-6-6zm-3 6a3 3 0 116 0v3H7V8zm3 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div><input type="hidden" name="role_id" id="role_id" value="2"></div>
                <button type="button" id="submit2" class="w-full py-2 px-4 bg-muda hover-button-login text-white font-semibold rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition duration-500 hover:scale-105">Register</button>
            </form>
            <p class="mt-8 text-center text-white">Already have an account? <a href="<?= urlpath('login') ?>" class="text-muda custom-hover2">Login</a></p>
            <p class="mt-2 text-center text-white">Forgot password?</p>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            function sendDataToBackend() {
                if($('#registerForm').valid()) {          
                    var form = document.getElementById('registerForm');
                    var formData = new FormData(form);
    
                    console.log("Sending data to backend..."); // Debug statement
                    console.log("Form Data:", formData); // Debug statement
    
                    $.ajax({
                        type: 'POST',
                        url: '<?= urlpath('register') ?>', // Construct URL dynamically
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            window.location.href = '<?= urlpath('login') ?>'; // Redirect dynamically
                            alert('Berhasil Membuat Akun!');
                        },
                        error: function(xhr, status, error) {
                            console.error("Error:", xhr.responseText); // Debug statement
                            try {
                                var response = JSON.parse(xhr.responseText);
                                alert(response.message);
                            } catch (e) {
                                alert("Terjadi kesalahan, mohon coba lagi");
                            }
                        }
                    });
                }
            }
            $('#submit2').click(function() {
                console.log("Submit button clicked"); // Debug statement
                sendDataToBackend();
            }); // Attach event handler
            $('#registerForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: "Bagian ini harus diisi",
                        email: "Silahkan masukkan Email yang valid"
                    },
                    username: {
                        required: "Bagian ini harus diisi"
                    },
                    password: {
                        required: "Password harus diisi"
                    }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass('text-red-500 text-xs');
                    error.insertAfter(element.parent());
                },
                highlight: function(element, errorClass, validClass) {
                    $(element)
                        .addClass('border-red-500 focus:ring-red-500 focus:border-red-500')
                        .removeClass('border-gray-300 dark:border-gray-600 focus:border-red-600 dark:focus:border-red-500');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element)
                        .removeClass('border-red-500 focus:ring-red-500 focus:border-red-500')
                        .addClass('border-gray-300 dark:border-gray-600 focus:border-red-600 dark:focus:border-red-500');
                },
                submitHandler: function(form) {
                    sendDataToBackend(); // Prevent default submit and use AJAX instead
                }
            });
        });
    </script>
<?php $body = ob_get_clean(); ?>

<?php include 'resources/views/master/master.php'; ?>