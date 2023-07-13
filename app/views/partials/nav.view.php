<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/" class="<?= uriPathIs('/') ? 'bg-gray-900' : '' ?> text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                        <? if (authUser()) { ?>
                            <a href="/notes" class="<?= uriPathIs('/notes') ? 'bg-gray-900' : '' ?> text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Notes</a>
                        <? } ?>
                        <? if (!authUser()) { ?>
                            <a href="/register" class="<?= uriPathIs('/register') ? 'bg-gray-900' : '' ?> text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Register</a>
                            <a href="/login" class="<?= uriPathIs('/login') ? 'bg-gray-900' : '' ?> text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Login</a>
                        <? } ?>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div class="flex gap-2">
                            <? if (authUser()) { ?>
                                <p class="text-white mt-2">You are signed in. (<?= authUser()['email'] ?>)</p>
                                <form action="/logout" method="POST">
                                    <button type="submit" class="flex w-full justify-center rounded-md bg-red-600 px-1.5 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-400">
                                        Log out
                                    </button>
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <a href="/" class="<?php echo uriPathIs('/') ? 'bg-gray-900' : ''; ?> text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Home</a>
            <? if (authUser()) { ?>
                <a href="/notes" class="<?php echo uriPathIs('/notes') ? 'bg-gray-900' : ''; ?> text-white block rounded-md px-3 py-2 text-base font-medium">Notes</a>
            <? } ?>
            <? if (!authUser()) { ?>
                <a href="/register" class="<?php echo uriPathIs('/register') ? 'bg-gray-900' : ''; ?> text-white block rounded-md px-3 py-2 text-base font-medium">Register</a>
                <a href="/login" class="<?php echo uriPathIs('/login') ? 'bg-gray-900' : ''; ?> text-white block rounded-md px-3 py-2 text-base font-medium">Login</a>
            <? } ?>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <? if (authUser()) { ?>
                        <p class="text-white">You are signed in (<?= authUser()['email'] ?>)</p>

                        <form class="mt-2" action="/logout" method="POST">
                            <button type="submit" class="flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-400">
                                Log out
                            </button>
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
</nav>