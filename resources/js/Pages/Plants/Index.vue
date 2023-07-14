<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Plant from '@/Components/Plant.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head } from '@inertiajs/vue3';

defineProps(['plants']);
</script>

<template>
	<Head title="Plants" />

	<AuthenticatedLayout>
		<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
			<h2>Plants</h2>
			<div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
				<Plant v-for="plant in plants" :key="plant.id" :plant="plant" />
			</div>
		</div>
	</AuthenticatedLayout>
</template>