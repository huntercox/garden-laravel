<template>
	<div>
		<h1>{{ plant.name }}</h1>
		<!-- Display other plant properties here -->
	</div>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Plant from '@/Components/Plant.vue';
import { Head } from '@inertiajs/vue3';


defineProps(['plant']);
</script>