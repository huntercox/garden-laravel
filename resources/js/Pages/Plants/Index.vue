<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Plant from '@/Components/Plant.vue';
import PlantCard from '@/Components/PlantCard.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head } from '@inertiajs/vue3';

defineProps(['plants'], { message: String });
</script>

<template>
	<Head title="Plants" />
	<div v-if="message" class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
		role="alert">
		<div class="flex">
			<div>
				<p class="text-sm">{{ message }}</p>
			</div>
		</div>
	</div>
	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Plants</h2>
		</template>
		<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
			<div class="mt-6 shadow-sm rounded-lg grid grid-cols-2 gap-3">
				<!-- <Plant v-for="plant in plants" :key="plant.id" :plant="plant" /> -->
				<PlantCard v-for="plant in plants" :key="plant.id" :plant="plant" />
			</div>
		</div>
	</AuthenticatedLayout>
</template>