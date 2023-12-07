<?php require "./views/partial/header.php" ?>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div>
        <?php if (!isset($_SESSION['attempts']) || $_SESSION['attempts'] === 0): ?>
            <a href="/login">
                <svg viewBox="0 0 316 316" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 fill-current text-gray-500">
                    <g id="XMLID_516_">
                        <path id="XMLID_517_" d="M15,160c8.284,0,15-6.716,15-15V85c0-30.327,24.673-55,55-55c30.327,0,55,24.673,55,55v45h-25
        c-8.284,0-15,6.716-15,15v170c0,8.284,6.716,15,15,15h200c8.284,0,15-6.716,15-15V145c0-8.284-6.716-15-15-15H170V85
        c0-46.869-38.131-85-85-85S0,38.131,0,85v60C0,153.284,6.716,160,15,160z" />
                    </g>
                </svg>
            </a>

        <?php else: ?>
            <h1 style="font-size:xx-large; color:red;" class="fill-current text-red-500 font-large">
                <?= $_SESSION['attempts'] ?>
            </h1>
        <?php endif; ?>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <!-- Session Status -->

        <form class="" method="POST" action="/login/store">
            <!-- Email Address -->
            <div>
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                    Username
                </label>
                <input
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                    value="<?= $_SESSION['username'] ?? null ?>" id="username" type="text" name="username"
                    required="required" autofocus="autofocus" autocomplete="username">

                <span class="text-sm text-red-600 dark:text-red-400 space-y-1" role="alert">
                    <strong>
                        <?= $message ?>
                    </strong>
                </span>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="password">
                    Password
                </label>

                <input
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                    id="password" type="password" name="password" required="required" autocomplete="current-password">

            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="/register">
                    Don't have an account? Sign
                    Up
                </a>

                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ml-3">
                    Log in
                </button>
            </div>
        </form>
    </div>
</div>
<script src="<?= path('/js/validator/login/index.js') ?>"></script>
<?php require "./views/partial/footer.php" ?>