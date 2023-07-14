<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

const form = useForm({
	name: '',
	date_planted: '',
});
</script>

<template>
	<Head title="Plants" />

	<AuthenticatedLayout>
		<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
			<h1>Create a new plant</h1>
			<h2>Plants</h2>
			<form @submit.prevent="form.post(route('plants.store'), { onSuccess: () => form.reset() })">
				<input v-model="form.name" placeholder="Name" type="text"
					class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
				<InputError :name="form.errors.name" class="mt-2" />
				<input v-model="form.date_planted" type="date"
					class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
				<InputError :date_planted="form.errors.date_planted" class="mt-2" />
				<PrimaryButton class="mt-4">Add Plant</PrimaryButton>
			</form>
		</div>
	</AuthenticatedLayout>
</template>