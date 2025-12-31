<x-filament-panels::page>
    <div class="space-y-6">
        <!-- Cache Management Card -->
        <x-filament::section>
            <x-slot name="heading">
                Cache Types
            </x-slot>

            <x-slot name="description">
                Clear specific cache types individually to ensure your application reflects the latest changes.
            </x-slot>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                <!-- Application Cache -->
                <div class="rounded-lg border border-gray-200 dark:border-gray-700 p-6 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary-100 dark:bg-primary-900">
                            <x-filament::icon
                                icon="heroicon-o-circle-stack"
                                class="h-6 w-6 text-primary-600 dark:text-primary-400"
                            />
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base font-semibold">Application</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Data cache</p>
                        </div>
                    </div>
                    <x-filament::button
                        wire:click="clearCache"
                        color="primary"
                        outlined
                        class="w-full"
                        size="sm"
                    >
                        Clear Cache
                    </x-filament::button>
                </div>

                <!-- Config Cache -->
                <div class="rounded-lg border border-gray-200 dark:border-gray-700 p-6 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-warning-100 dark:bg-warning-900">
                            <x-filament::icon
                                icon="heroicon-o-cog-6-tooth"
                                class="h-6 w-6 text-warning-600 dark:text-warning-400"
                            />
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base font-semibold">Config</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Configuration</p>
                        </div>
                    </div>
                    <x-filament::button
                        wire:click="clearConfigCache"
                        color="warning"
                        outlined
                        class="w-full"
                        size="sm"
                    >
                        Clear Config
                    </x-filament::button>
                </div>

                <!-- Route Cache -->
                <div class="rounded-lg border border-gray-200 dark:border-gray-700 p-6 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-info-100 dark:bg-info-900">
                            <x-filament::icon
                                icon="heroicon-o-map"
                                class="h-6 w-6 text-info-600 dark:text-info-400"
                            />
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base font-semibold">Routes</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Routing cache</p>
                        </div>
                    </div>
                    <x-filament::button
                        wire:click="clearRouteCache"
                        color="info"
                        outlined
                        class="w-full"
                        size="sm"
                    >
                        Clear Routes
                    </x-filament::button>
                </div>

                <!-- View Cache -->
                <div class="rounded-lg border border-gray-200 dark:border-gray-700 p-6 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-success-100 dark:bg-success-900">
                            <x-filament::icon
                                icon="heroicon-o-eye"
                                class="h-6 w-6 text-success-600 dark:text-success-400"
                            />
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base font-semibold">Views</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Compiled views</p>
                        </div>
                    </div>
                    <x-filament::button
                        wire:click="clearViewCache"
                        color="success"
                        outlined
                        class="w-full"
                        size="sm"
                    >
                        Clear Views
                    </x-filament::button>
                </div>
            </div>
        </x-filament::section>

        <!-- Optimization Section -->
        <x-filament::section>
            <x-slot name="heading">
                Application Optimization
            </x-slot>

            <x-slot name="description">
                Optimize your application for better performance in production environment.
            </x-slot>

            <div class="flex flex-wrap gap-3">
                <x-filament::button
                    wire:click="optimizeApplication"
                    color="success"
                    icon="heroicon-o-bolt"
                >
                    Optimize Application
                </x-filament::button>

                <x-filament::button
                    wire:click="clearAllCaches"
                    color="danger"
                    icon="heroicon-o-trash"
                >
                    Clear All Caches
                </x-filament::button>
            </div>
        </x-filament::section>

        <!-- Information Section -->
        <x-filament::section>
            <x-slot name="heading">
                About Cache Types
            </x-slot>

            <div class="space-y-4 text-sm">
                <div class="flex gap-3">
                    <div class="flex-shrink-0">
                        <x-filament::icon
                            icon="heroicon-o-circle-stack"
                            class="h-5 w-5 text-gray-400"
                        />
                    </div>
                    <div>
                        <h4 class="font-semibold mb-1">Application Cache</h4>
                        <p class="text-gray-600 dark:text-gray-400">
                            Stores data cache created by your application using Cache facade. Clear this when you update cached data.
                        </p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="flex-shrink-0">
                        <x-filament::icon
                            icon="heroicon-o-cog-6-tooth"
                            class="h-5 w-5 text-gray-400"
                        />
                    </div>
                    <div>
                        <h4 class="font-semibold mb-1">Config Cache</h4>
                        <p class="text-gray-600 dark:text-gray-400">
                            Stores compiled configuration files for faster loading. Clear this after modifying config files.
                        </p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="flex-shrink-0">
                        <x-filament::icon
                            icon="heroicon-o-map"
                            class="h-5 w-5 text-gray-400"
                        />
                    </div>
                    <div>
                        <h4 class="font-semibold mb-1">Route Cache</h4>
                        <p class="text-gray-600 dark:text-gray-400">
                            Stores compiled routes for faster routing. Clear this after adding or modifying routes.
                        </p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="flex-shrink-0">
                        <x-filament::icon
                            icon="heroicon-o-eye"
                            class="h-5 w-5 text-gray-400"
                        />
                    </div>
                    <div>
                        <h4 class="font-semibold mb-1">View Cache</h4>
                        <p class="text-gray-600 dark:text-gray-400">
                            Stores compiled Blade templates. Clear this after modifying view files.
                        </p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="flex-shrink-0">
                        <x-filament::icon
                            icon="heroicon-o-bolt"
                            class="h-5 w-5 text-gray-400"
                        />
                    </div>
                    <div>
                        <h4 class="font-semibold mb-1">Optimize Application</h4>
                        <p class="text-gray-600 dark:text-gray-400">
                            Caches config, routes, and views together for optimal production performance.
                        </p>
                    </div>
                </div>
            </div>
        </x-filament::section>

        <!-- Warning -->
        <x-filament::section>
            <div class="flex items-start gap-3 rounded-lg bg-warning-50 dark:bg-warning-900/10 border border-warning-200 dark:border-warning-800 p-4">
                <x-filament::icon
                    icon="heroicon-o-exclamation-triangle"
                    class="h-5 w-5 text-warning-600 dark:text-warning-400 flex-shrink-0 mt-0.5"
                />
                <div class="flex-1">
                    <h4 class="font-semibold text-warning-900 dark:text-warning-100 mb-1">Important Note</h4>
                    <p class="text-sm text-warning-700 dark:text-warning-300">
                        Clearing caches in production may temporarily impact performance as caches are rebuilt. Use optimization after clearing caches in production environments.
                    </p>
                </div>
            </div>
        </x-filament::section>
    </div>
</x-filament-panels::page>