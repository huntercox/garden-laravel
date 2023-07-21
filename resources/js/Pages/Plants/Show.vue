<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Plant from '@/Components/Plant.vue';
import { Head } from '@inertiajs/vue3';

defineProps(['plant']);
</script>
<template>
	<Head title="{{ plant.name }}" />
	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ plant.name }}</h2>
		</template>
		<div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">
			<div class="mt-6 shadow-sm rounded-lg">
				<Plant :plant="plant" />
			</div>
		</div>
	</AuthenticatedLayout>
</template>
