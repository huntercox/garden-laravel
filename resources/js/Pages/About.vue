<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Plant from '@/Components/Plant.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head } from '@inertiajs/vue3';

defineProps(['plants'], { message: String });
</script>
<template>
	<Head title="About" />
	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">About</h2>
		</template>
		<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
			<div class="mt-6 shadow-sm rounded-lg divide-y">
				<Plant v-for="plant in plants" :key="plant.id" :plant="plant" />
			</div>
		</div>
	</AuthenticatedLayout>
</template>