<form method="GET">
    <input
        type="text"
        name="search"
        placeholder="Search by username or email"
        value="<?= htmlspecialchars($search ?? '', ENT_QUOTES, 'UTF-8'); ?>"
    >

    <button type="submit">Search</button>
    <a href="<?= BASE_URL; ?>">Clear</a>
</form>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']); ?></td>
                    <td><?= htmlspecialchars($user['username']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Nenhum usuário encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>