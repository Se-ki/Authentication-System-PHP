<?php require "./views/partial/header.php" ?>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div>
        <a>
            <svg viewBox="0 0 316 316" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 fill-current text-gray-500">
                <g id="XMLID_509_">
                    <path id="XMLID_510_" d="M65,330h200c8.284,0,15-6.716,15-15V145c0-8.284-6.716-15-15-15h-15V85c0-46.869-38.131-85-85-85
        S80,38.131,80,85v45H65c-8.284,0-15,6.716-15,15v170C50,323.284,56.716,330,65,330z M180,234.986V255c0,8.284-6.716,15-15,15
        s-15-6.716-15-15v-20.014c-6.068-4.565-10-11.824-10-19.986c0-13.785,11.215-25,25-25s25,11.215,25,25
        C190,223.162,186.068,230.421,180,234.986z M110,85c0-30.327,24.673-55,55-55s55,24.673,55,55v45H110V85z" />
                </g>
            </svg>
        </a>
    </div>
    <div onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload=""
        class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <!-- Session Status -->
        <input type="hidden" id="timeIncrement" value="<?php echo $timeIncrement; ?>">
        <form method="POST" action="">
            <input type="hidden" name="_token" value="OZafFJG8349mRIkHgPOTslrlW4kpSin0ru8SAbkp" autocomplete="off">
            <!-- Email Address -->
            <div>
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                    Username
                </label>
                <input
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                    id="email" type="email" name="email" value="<?= $_SESSION['username'] ?? null ?>"
                    required="required" autofocus="autofocus" autocomplete="username" disabled>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="password">
                    Password
                </label>

                <input
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                    id="password" type="password" name="password" required="required" autocomplete="current-password"
                    disabled>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    Don't have an account? Sign
                    Up
                </a>

                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ml-3"
                    disabled>
                    Log in
                </button>
            </div>
        </form>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <p class="limitreach flex items-center justify-center" style="color: red">Too many attempts!</p>
        <div class="flex items-center justify-center text-white" id="total-time-left"></div>
    </div>
</div>
<script src="<?= path('/js/validator/login/index.js') ?>"></script>
<?php require "./views/partial/footer.php" ?>