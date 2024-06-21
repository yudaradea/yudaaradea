<div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
    <a
        class="relative inline-flex items-center text-sm font-semibold text-gray-800 align-middle bg-white border border-gray-200 rounded-full shadow-sm cursor-pointer md:py-1 hs-dropdown-toggle md:ps-1 md:pe-3 md:gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
    >
        <img
            class="object-cover w-8 h-8 rounded-full"
            src="{{ Auth::user()->profile_photo_url }}"
            alt=""
            aria-hidden="true"
        />

        <span class="hidden md:block text-gray-600 font-medium truncate max-w-[7.5rem] dark:text-neutral-400">
            {{ auth()->user()->name }}
        </span>
        <svg
            class="hidden hs-dropdown-open:rotate-180 size-4 md:block"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="m6 9 6 6 6-6" />
        </svg>
    </a>
    <div
        class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max w-[200px] hidden z-[12]"
        aria-labelledby="hs-dropdown-custom-icon-trigger"
    >
        <div class="p-0 py-2 card-body">
            <a
                href="{{ route('admin.dashboard') }}"
                class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400"
            >
                <i class="text-xl ti ti-user"></i>
                <p class="text-sm">Dashboard</p>
            </a>
            <hr />
            <div class="mt-[7px] grid">
                <form method="post" action="{{ route('logout') }}" x-data>
                    @csrf

                    <button
                        type="submit"
                        class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400 w-full"
                    >
                        <i class="mt-0.5 text-xl ti ti-logout-2"></i>
                        <p class="text-sm">Log Out</p>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
