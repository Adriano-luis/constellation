<main class="page-content">
    <div class="container">
        <div class="page-title">
            <h1>Users</h1>
            <p>Manage registered users.</p>
        </div>

        <form method="GET" class="filter-form">
            <input
                type="text"
                name="search"
                placeholder="Search by username or email"
                value="<?= htmlspecialchars($search ?? '', ENT_QUOTES, 'UTF-8'); ?>"
            >

            <button type="submit">Search</button>
            <a href="<?= BASE_URL; ?>" class="clear-link">Clear</a>
        </form>

        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= htmlspecialchars(date('m/d/Y H:i', strtotime($user['created_at'])),ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= htmlspecialchars(date('m/d/Y H:i', strtotime($user['updated_at'])),ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="empty-row">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
