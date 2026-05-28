<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/login.css">
</head>
<body>
    <div class="login-page">
        <div class="login-box">
            <div class="login-header">
                <h1>Login</h1>
                <p>
                    Enter your credentials to continue.
                </p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="text-error">
                    <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                </div>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="name@email.com"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="pass">
                        Password
                    </label>

                    <input
                        type="password"
                        name="pass"
                        id="pass"
                        placeholder="••••••••"
                        required
                    >
                </div>
                <button type="submit">
                    Login
                </button>
            </form>
            <div class="create-link"><a href="<?=  BASE_URL ?>login/createAccount">Create account</a></div>
        </div>
    </div>
</body>
</html>