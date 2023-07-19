<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';


defineProps({
	message: String,
});
const form = useForm({
	name: '',
	variety: '',
	date_planted: '',
	days_to_mature: '',
	quantity: '',
	file_input: '',
	stages: [
		{
			stageName: ''
		}
	]
});

function addStage(e) {
	form.stages.push({
		stageName: ''
	})
	e.preventDefault();
}

function remove(index) {
	form.stages.splice(index, 1);
}
</script>

<template>
	<Head title="Plants" />

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Add a Plant</h2>
		</template>
		<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
			<form @submit.prevent="form.post(route('plants.store'), { onSuccess: () => form.reset() })">
				<label for="name">
					Name
					<input v-model="form.name" placeholder="Name" type="text" name="name"
						class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-3" />
					<InputError :message="form.errors.name" class="mt-2" />
				</label>

				<label for="variety">
					Variety
					<input v-model="form.variety" placeholder="Variety" type="text" name="variety"
						class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-3" />
					<InputError :message="form.errors.variety" class="mt-2" />
				</label>

				<div class="flex flex-col sm:flex-row">
					<label for="days_to_mature" class="mr-4 w-full">
						Days to Maturity
						<input v-model="form.days_to_mature" placeholder="Days till Maturity" type="number" name="days_to_mature"
							class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
						<InputError :message="form.errors.days_to_mature" class="mt-2" />
					</label>


					<label for="quantity" class="w-full">
						Quantity
						<input v-model="form.quantity" placeholder="Quantity" type="number" name="quantity"
							class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
						<InputError :message="form.errors.quantity" class="mt-2" />
					</label>
				</div>

				<div class="flex flex-col sm:flex-row">
					<label for="date_planted" class="mr-4 w-full">
						Date Planted
						<input v-model="form.date_planted" type="date" name="date_planted"
							class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
						<InputError :message="form.errors.date_planted" class="mt-2" />
					</label>

					<label for="file_input" class="w-full">
						Image
						<input type="file" name="file_input" @input="form.file_input = $event.target.files[0]"
							class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
						<InputError :message="form.errors.file_input" class="mt-2" />
					</label>
				</div>

				<div v-for="stage in form.stages" :key="index">
					<div class="flex justify-start">
						<input v-model="stage.stageName" />
						<button type="button" class="ml-2 rounded-md border px-3 py-2 bg-red-600 text-white" @click="remove(index)"
							v-show="index != 0">
							Remove
						</button>
					</div>

				</div>

				<div>
					<button type="button" @click="addStage">Add Stage</button>
				</div>

				<PrimaryButton class="block mt-4 bg-green-500">Add Plant</PrimaryButton>
			</form>
		</div>
	</AuthenticatedLayout>
</template>