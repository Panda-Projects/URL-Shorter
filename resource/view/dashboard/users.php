<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
            Users
        </h2>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <th class="px-4 py-3">Username</th>
                        <th class="px-4 py-3">E-Mail</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                    </thead>
                    <tbody
                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    <tr class="text-gray-700 dark:text-gray-400">
                        <form method="post">
                            <input type="hidden" name="action" value="createRedirect">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div
                                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                                    >
                                        <img
                                                class="object-cover w-full h-full rounded-full"
                                                src="<?= $_ENV["WEBSITE_URL"] ?>/assets/img/profil-picture.png"
                                                alt=""
                                                loading="lazy"
                                        />
                                        <div
                                                class="absolute inset-0 rounded-full shadow-inner"
                                                aria-hidden="true"
                                        ></div>
                                    </div>
                                    <div>
                                        <input
                                                name="username"
                                                class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                placeholder=""
                                        />

                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <input
                                        name="redirect_url"
                                        class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="https://example.com"
                                />

                            </td>

                            <td class="px-4 py-3 font-semibold text-sm">
                                <button
                                        class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                        type="submit"
                                >
                                    Save
                                </button>
                            </td>
                        </form>
                    </tr>
                    <?php
                    foreach ($redirects as $redirect1) {
                        ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div
                                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                                    >
                                        <img
                                                class="object-cover w-full h-full rounded-full"
                                                src="<?= $_ENV["WEBSITE_URL"] ?>/assets/img/profil-picture.png"
                                                alt=""
                                                loading="lazy"
                                        />
                                        <div
                                                class="absolute inset-0 rounded-full shadow-inner"
                                                aria-hidden="true"
                                        ></div>
                                    </div>
                                    <div>
                                        <?php $username = $user->userFromId($redirect1["userId"]); ?>
                                        <p class="font-semibold"><?= $username == null ? "Delete User" : $username["username"] ?></p>

                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <a href="<?= $redirect1["redirect_url"] ?>"><i
                                            class="fa-solid fa-up-right-from-square"></i> <?= $redirect1["redirect_url"] ?>
                                </a>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                <form method="post">
                                    <input name="action" value="deleteRedirect" type="hidden">
                                    <input name="id" value="<?= $redirect1["id"] ?>" type="hidden">
                                    <button
                                            class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:shadow-outline-purple"
                                            type="submit"
                                    >
                                        <svg class="w-6 h-6 text-red-600 hover:text-red-700"
                                             fill="currentColor"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
            >
                <span class="flex items-center col-span-3">
                  Showing <?= count($redirects) ?> of <?= count($redirects) ?>
                </span>
                <span class="col-span-2"></span>
            </div>
        </div>
    </div>
</main>