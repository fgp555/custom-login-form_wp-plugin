<?php
/* plugin name: custom_login_form */


// ========== Customizing_the_Login_Form... ==========
// https://codex.wordpress.org/Customizing_the_Login_Form
function custom_login_form_script()
{ ?>
    <style type="text/css">
        #login-message {
            color: indigo;
        }
        #login {
            display: none;
        }

        .x404page {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
    <h1 class="x404page">404 Page</h1>
    <script type="module">
        document.body.addEventListener("keydown", shortcut1);
        let login = document.querySelector("#login");
        let h1 = document.querySelector("h1");
        document.querySelector("#user_login").disabled = true


        function shortcut1(e) {
            if (e.key == "s" && e.ctrlKey || e.key == "S" && e.ctrlKey) {
                document.querySelector("#user_pass").removeAttribute("disabled", "");
                document.querySelector("#user_login").removeAttribute("disabled", "");
                login.style.display = "block";
                h1.style.display = "none";
                e.preventDefault();
            } else if (e.key == "ArrowDown" && e.ctrlKey) {
                e.preventDefault();
            } else {
                return;
            }
        }
    </script>
<?php }

// ==========  ==========
add_action('login_enqueue_scripts', 'custom_login_form_script');

function custom_login_form_stylesheet()
{
    wp_enqueue_style('custom-login', plugin_dir_url(__FILE__) . '/custom_login_form.css');
}
add_action('login_enqueue_scripts', 'custom_login_form_stylesheet');

?>