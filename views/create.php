<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/login.css">
</head>
<body>
    <div class="login-page">
        <div class="login-box">
            <div class="login-header">
                <h1>Create Account</h1>
            </div>

            <?php if (!empty($errors)): ?>
                <div class="form-errors">
                    <?php foreach ($errors as $error): ?>
                        <p class="text-error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="" method="post" id="create-account-form">
                <div class="form-group">
                    <label for="name">Name</label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Adriano Oliveira"
                        value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email</label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="name@email.com"
                        value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
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
                        minlength="6"
                        pattern="(?=.*\d).{6,}"
                        title="Password must have at least 6 characters and 1 number."
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="pass-check">
                        Confirm password
                    </label>

                    <input
                        type="password"
                        name="pass_check"
                        id="pass-check"
                        placeholder="••••••••"
                        required
                    >
                </div>

                <button type="submit">
                    Create
                </button>
            </form>
        </div>
    </div>
</body>
</html>