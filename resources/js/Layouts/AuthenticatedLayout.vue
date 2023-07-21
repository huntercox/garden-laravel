<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
	<div>
		<div class="min-h-screen bg-gray-100">
			<nav class="bg-green-500 border-b border-gray-100">
				<!-- Primary Navigation Menu -->
				<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
					<div class="flex justify-between h-16">
						<div class="flex">
							<!-- Logo -->
							<div class="shrink-0 flex items-center">
								<Link :href="route('dashboard')" class="h-full">
								<div class="bg-white h-full">
									<div class="block h-full text-xl px-2 md:px-3 md:text-2xl flex items-center">🌱</div>
								</div>
								</Link>
							</div>

							<!-- Navigation Links -->
							<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
								<NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="text-white">
									Dashboard
								</NavLink>

								<NavLink :href="route('about')" :active="route().current('about')" class="text-white">
									About
								</NavLink>

								<NavLink :href="route('calendar')" :active="route().current('calendar')" class="text-white">
									Calendar
								</NavLink>

								<NavLink :href="route('plants.create')" :active="route().current('plants.create')" class="text-white">
									Add a Plant
								</NavLink>

								<NavLink :href="route('plants.index')" :active="route().current('plants.index')" class="text-white">
									All Plants
								</NavLink>
							</div>
						</div>

						<div class="hidden sm:flex sm:items-center sm:ml-6">
							<!-- Settings Dropdown -->
							<div class="ml-3 relative">
								<Dropdown align="right" width="48">
									<template #trigger>
										<span class="inline-flex rounded-md">
											<button type="button"
												class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
												<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-cog" width="24"
													height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
													stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
													<path d="M6 21v-2a4 4 0 0 1 4 -4h2.5"></path>
													<path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
													<path d="M19.001 15.5v1.5"></path>
													<path d="M19.001 21v1.5"></path>
													<path d="M22.032 17.25l-1.299 .75"></path>
													<path d="M17.27 20l-1.3 .75"></path>
													<path d="M15.97 17.25l1.3 .75"></path>
													<path d="M20.733 20l1.3 .75"></path>
												</svg>
												<!-- {{ $page.props.auth.user.name }} -->

												<svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
													fill="currentColor">
													<path fill-rule="evenodd"
														d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
														clip-rule="evenodd" />
												</svg>
											</button>
										</span>
									</template>

									<template #content>
										<DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
										<DropdownLink :href="route('logout')" method="post" as="button">
											Log Out
										</DropdownLink>
									</template>
								</Dropdown>
							</div>
						</div>

						<!-- Hamburger -->
						<div class="-mr-2 flex items-center sm:hidden">
							<button @click="showingNavigationDropdown = !showingNavigationDropdown"
								class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
								<svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
									<path :class="{
										hidden: showingNavigationDropdown,
										'inline-flex': !showingNavigationDropdown,
									}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
									<path :class="{
										hidden: !showingNavigationDropdown,
										'inline-flex': showingNavigationDropdown,
									}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
								</svg>
							</button>
						</div>
					</div>
				</div>

				<!-- Responsive Navigation Menu -->
				<div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
					class="sm:hidden bg-gray-100 border-b border-green-100">
					<div class="pt-2 pb-3 space-y-1">
						<ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
							Dashboard
						</ResponsiveNavLink>

						<ResponsiveNavLink :href="route('plants.create')" :active="route().current('plants.create')">
							Add a Plant
						</ResponsiveNavLink>

						<ResponsiveNavLink :href="route('plants.index')" :active="route().current('plants.index')">
							Plants
						</ResponsiveNavLink>
					</div>

					<!-- Responsive Settings Options -->
					<div class="pt-4 pb-1 border-t border-gray-200">
						<div class="px-4">
							<div class="font-medium text-base text-gray-800">
								{{ $page.props.auth.user.name }}
							</div>
							<div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
						</div>

						<div class="mt-3 space-y-1">
							<ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
							<ResponsiveNavLink :href="route('logout')" method="post" as="button">
								Log Out
							</ResponsiveNavLink>
						</div>
					</div>
				</div>
			</nav>

			<!-- Page Heading -->
			<header class="bg-white shadow" v-if="$slots.header">
				<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
					<slot name="header" />
				</div>
			</header>

			<!-- Page Content -->
			<main>
				<slot />
			</main>
		</div>
	</div>
</template>
