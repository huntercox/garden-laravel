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
			name: '',
			duration: '',
			watering: '',
			fertilizing: '',
			spacing: '',
			lighting: ''
		}
	]
});

function addStage(e) {
	form.stages.push({
		name: '',
		duration: '',
		watering: '',
		fertilizing: '',
		spacing: '',
		lighting: '',
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
						class="block w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mb-3" />
					<InputError :message="form.errors.name" class="mt-2" />
				</label>

				<label for="variety">
					Variety
					<input v-model="form.variety" placeholder="Variety" type="text" name="variety"
						class="block w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mb-3" />
					<InputError :message="form.errors.variety" class="mt-2" />
				</label>

				<div class="flex flex-col sm:flex-row">
					<label for="days_to_mature" class="mr-4 w-full">
						Days to Maturity
						<input v-model="form.days_to_mature" placeholder="Days till Maturity" type="number" name="days_to_mature"
							class="block w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
						<InputError :message="form.errors.days_to_mature" class="mt-2" />
					</label>


					<label for="quantity" class="w-full">
						Quantity
						<input v-model="form.quantity" placeholder="Quantity" type="number" name="quantity"
							class="block w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
						<InputError :message="form.errors.quantity" class="mt-2" />
					</label>
				</div>

				<div class="flex flex-col sm:flex-row">
					<label for="date_planted" class="mr-4 w-full">
						Date Planted
						<input v-model="form.date_planted" type="date" name="date_planted"
							class="block w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
						<InputError :message="form.errors.date_planted" class="mt-2" />
					</label>

					<label for="file_input" class="w-full">
						Image
						<input type="file" name="file_input" @input="form.file_input = $event.target.files[0]"
							class="block w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
						<InputError :message="form.errors.file_input" class="mt-2" />
					</label>
				</div>

				<div v-for="stage in form.stages" :key="index">
					<div class="stage bg-gray-200 p-4 mt-5 border-solid border-2 border-gray-400 relative">
						<div class="mb-5 flex">
							<button type="button" class="order-last ml-2 absolute top-0 right-0 hover:text-white,bg-black"
								@click="remove(index)" v-show="index != 0">

								<div class="text-2xl">
									<svg class="svg-icon" style="width: 1em; height: 1em;" viewBox="0 0 20 20">
										<path
											d="M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z">
										</path>
									</svg>
								</div>
							</button>
							<label for="name" class="flex">
								<p class="pr-3 font-black w-1/2 text-lg">Stage Name:</p>
								<input v-model="stage.name" type="text" name="name"
									class="w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-300 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3 mt-1" />
							</label>
						</div>
						<div class="w-full mb-2">
							<label for="duration">
								<span class="pr-3 font-black">Duration:</span>
								<input v-model="stage.duration" type="text" name="duration"
									class="w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-300 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3 mt-1" />
							</label>
						</div>
						<div class="flex">
							<div class="w-full">
								<label for="watering">
									<span class="block font-black">Watering Schedule:</span>
									<input v-model="stage.watering" type="text" name="watering"
										class="w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-300 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3 mt-1" />
								</label>
								<label for="fertlizing">
									<span class="block font-black">Fertilization Schedule:</span>
									<input v-model="stage.fertilizing" type="text" name="fertlizing"
										class="w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-300 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3 mt-1" />
								</label>
							</div>
						</div>
						<div class="w-full">
							<div class="flex">
								<label for="spacing" class="w-full mr-3">
									<span class="block font-black">Spacing:</span>
									<input v-model="stage.spacing" type="text" name="spacing"
										class="w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-300 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3 mt-1" />
								</label>
								<label for="lighting" class="w-full">
									<span class="block font-black">Lighting:</span>
									<input v-model="stage.lighting" type="text" name="lighting"
										class="w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-300 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3 mt-1" />
								</label>
							</div>
						</div>
					</div>
				</div>

				<div class="w-full">
					<button type="button" @click="addStage" class="px-5 py-3 mt-5 bg-gray-200 rounded-md">Add Stage</button>
				</div>

				<PrimaryButton class="block mt-10 bg-green-500 text-2xl">Add Plant</PrimaryButton>
			</form>
		</div>
	</AuthenticatedLayout>
</template>