<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
            Dashboard
        </h2>
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <div
                        class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                >
                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path d="M172.5 131.1C228.1 75.51 320.5 75.51 376.1 131.1C426.1 181.1 433.5 260.8 392.4 318.3L391.3 319.9C381 334.2 361 337.6 346.7 327.3C332.3 317 328.9 297 339.2 282.7L340.3 281.1C363.2 249 359.6 205.1 331.7 177.2C300.3 145.8 249.2 145.8 217.7 177.2L105.5 289.5C73.99 320.1 73.99 372 105.5 403.5C133.3 431.4 177.3 435 209.3 412.1L210.9 410.1C225.3 400.7 245.3 404 255.5 418.4C265.8 432.8 262.5 452.8 248.1 463.1L246.5 464.2C188.1 505.3 110.2 498.7 60.21 448.8C3.741 392.3 3.741 300.7 60.21 244.3L172.5 131.1zM467.5 380C411 436.5 319.5 436.5 263 380C213 330 206.5 251.2 247.6 193.7L248.7 192.1C258.1 177.8 278.1 174.4 293.3 184.7C307.7 194.1 311.1 214.1 300.8 229.3L299.7 230.9C276.8 262.1 280.4 306.9 308.3 334.8C339.7 366.2 390.8 366.2 422.3 334.8L534.5 222.5C566 191 566 139.1 534.5 108.5C506.7 80.63 462.7 76.99 430.7 99.9L429.1 101C414.7 111.3 394.7 107.1 384.5 93.58C374.2 79.2 377.5 59.21 391.9 48.94L393.5 47.82C451 6.731 529.8 13.25 579.8 63.24C636.3 119.7 636.3 211.3 579.8 267.7L467.5 380z"/>
                    </svg>

                </div>
                <div>
                    <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                        Links
                    </p>
                    <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                        <?= count($redirects) ?>
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <div
                        class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                >
                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path d="M319.9 320c57.41 0 103.1-46.56 103.1-104c0-57.44-46.54-104-103.1-104c-57.41 0-103.1 46.56-103.1 104C215.9 273.4 262.5 320 319.9 320zM369.9 352H270.1C191.6 352 128 411.7 128 485.3C128 500.1 140.7 512 156.4 512h327.2C499.3 512 512 500.1 512 485.3C512 411.7 448.4 352 369.9 352zM512 160c44.18 0 80-35.82 80-80S556.2 0 512 0c-44.18 0-80 35.82-80 80S467.8 160 512 160zM183.9 216c0-5.449 .9824-10.63 1.609-15.91C174.6 194.1 162.6 192 149.9 192H88.08C39.44 192 0 233.8 0 285.3C0 295.6 7.887 304 17.62 304h199.5C196.7 280.2 183.9 249.7 183.9 216zM128 160c44.18 0 80-35.82 80-80S172.2 0 128 0C83.82 0 48 35.82 48 80S83.82 160 128 160zM551.9 192h-61.84c-12.8 0-24.88 3.037-35.86 8.24C454.8 205.5 455.8 210.6 455.8 216c0 33.71-12.78 64.21-33.16 88h199.7C632.1 304 640 295.6 640 285.3C640 233.8 600.6 192 551.9 192z"/>
                    </svg>
                </div>
                <div>
                    <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                        Users
                    </p>
                    <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                        <?= $user->countUser() ?>
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <div
                        class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                >
                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path d="M0 352c0 88.38 71.63 160 160 160h64c88.38 0 160-71.63 160-160V224H0V352zM176 0H160C71.63 0 0 71.62 0 160v32h176V0zM224 0h-16v192H384V160C384 71.62 312.4 0 224 0z"/>
                    </svg>
                </div>
                <div>
                    <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                        Total Clicks
                    </p>
                    <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                        <?= $redirect->getClicks() ?>
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <div
                        class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                                fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd"
                        ></path>
                    </svg>
                </div>
                <div>
                    <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                        Pending contacts
                    </p>
                    <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                        35
                    </p>
                </div>
            </div>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <th class="px-4 py-3">User</th>
                        <th class="px-4 py-3">Redirect</th>
                        <th class="px-4 py-3">Code</th>
                        <th class="px-4 py-3">Date</th>
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
                                        <p class="font-semibold">Self</p>

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
                            <td class="px-4 py-3 text-xs">
                        <span
                                class="px-2 py-1 text-sm leading-tight rounded-full"
                        >
                          <input
                                  name="code"
                                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                  placeholder="discord"
                          />
                        </span>
                            </td>
                            <td class="px-4 py-3 font-semibold text-sm">
                                <?= date("d.m.Y") ?>
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
                            <td class="px-4 py-3 text-xs">
                        <span
                                class="px-2 py-1 text-sm leading-tight rounded-full"
                        >
                          <?= $redirect1["code"] ?>
                            <button
                                    style="cursor: pointer; display: inline-block; padding-left: 5px"
                                    onclick="copy('<?= $_ENV["WEBSITE_URL"] ?>/<?= $redirect1["code"] ?>')">
                                <svg
                                        class="w-5 h-5"
                                        fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                            d="M384 96L384 0h-112c-26.51 0-48 21.49-48 48v288c0 26.51 21.49 48 48 48H464c26.51 0 48-21.49 48-48V128h-95.1C398.4 128 384 113.6 384 96zM416 0v96h96L416 0zM192 352V128h-144c-26.51 0-48 21.49-48 48v288c0 26.51 21.49 48 48 48h192c26.51 0 48-21.49 48-48L288 416h-32C220.7 416 192 387.3 192 352z"/></svg>
                            </button>
                            <div id="tooltip-default" role="tooltip"
                                 class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                            Tooltip content
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        </span>
                            </td>
                            <td class="px-4 py-3 font-semibold text-sm">
                                <?= (new DateTime($redirect1["date"]))->format('d.m.Y') ?>
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
<script>
    function copy(copyText) {
        navigator.clipboard.writeText(copyText)
    }
</script>
