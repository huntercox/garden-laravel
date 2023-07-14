<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

const form = useForm({
	name: '',
	date_planted: '',
	days_to_mature: '',
});

import validate from 'validate.js';


</script>

<template>
	<Head title="Plants" />

	<AuthenticatedLayout>
		<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
			<h1>Create a new plant</h1>

			<form @submit.prevent="form.post(route('plants.store'), { onSuccess: () => form.reset() })">
				<input v-model="form.name" placeholder="Name" type="text"
					class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-3" />
				<InputError :name="form.errors.name" class="mt-2" />

				<input v-model="form.date_planted" type="date"
					class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
				<InputError :date_planted="form.errors.date_planted" class="mt-2" />

				<label for="days_to_mature">
					<input v-model="form.days_to_mature" placeholder="Days till Maturity" type="number" name="days_to_mature"
						class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
					<InputError :days_to_mature="form.errors.days_to_mature" class="mt-2" />
				</label>

				<PrimaryButton class="mt-4">Add Plant</PrimaryButton>
			</form>
		</div>
	</AuthenticatedLayout>
</template>