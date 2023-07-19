<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

import dayjs from 'dayjs';

// Relative Dates
import relativeTime from 'dayjs/plugin/relativeTime';
dayjs.extend(relativeTime);


// IsSameOrBefore
import isSameOrBefore from 'dayjs/plugin/isSameOrBefore';
dayjs.extend(isSameOrBefore);

// Formatting
import localizedFormat from 'dayjs/plugin/localizedFormat';
import { onMounted } from 'vue';
dayjs.extend(localizedFormat)

const props = defineProps(['plant']);

const form = useForm({
	name: props.plant.name,
	variety: props.plant.variety,
	date_planted: props.plant.date_planted,
	days_to_mature: props.plant.days_to_mature,
	quantity: props.plant.quantity,
	file_input: null,
	stages: props.plant.stages,
	_method: 'put',
});

const editing = ref(false);

const harvestDate = ref(dayjs(props.plant.harvest_date));
const harvestDateIsPastOrToday = ref(false);

onMounted(() => {
	harvestDateIsPastOrToday.value = harvestDate.value.isSameOrBefore(dayjs());
})

</script>

<template>
	<div class="p-2 pt-4 flex space-x-2 bg-green-100 border-solid border-green-500 border-2 border-top-4 mb-2">
		<div class="flex-1">
			<form v-if="editing"
				@submit.prevent="form.post(route('plants.update', plant.id), { onSuccess: () => editing = false })">
				<label for="name">
					Name
					<input v-model="form.name" placeholder="Name" type="text" name="name"
						class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-3" />
					<InputError :name="form.errors.name" class="mt-2" />
				</label>

				<label for="variety">
					Variety
					<input v-model="form.variety" placeholder="Variety" type="text" name="variety"
						class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-3" />
					<InputError :variety="form.errors.variety" class="mt-2" />
				</label>

				<label for="date_planted">
					Date Planted
					<input v-model="form.date_planted" type="date" name="date_planted"
						class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
					<InputError :date_planted="form.errors.date_planted" class="mt-2" />
				</label>

				<label for="days_to_mature">
					Days to Maturity
					<input v-model="form.days_to_mature" placeholder="Days till Maturity" type="number" name="days_to_mature"
						class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
					<InputError :days_to_mature="form.errors.days_to_mature" class="mt-2" />
				</label>

				<label for="quantity">
					Quantity
					<input v-model="form.quantity" placeholder="Quantity" type="number" name="quantity"
						class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
					<InputError :quantity="form.errors.quantity" class="mt-2" />
				</label>

				<label for="file_input">
					Image
					<input type="file" @input="form.file_input = $event.target.files[0]"
						class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-500 mb-3" />
					<InputError :file_input="form.errors.file_input" class="mt-2" />
				</label>

				<div class="space-x-2">
					<PrimaryButton class="mt-4">Save</PrimaryButton>
					<button class="mt-4" @click="editing = false; form.reset(); form.clearErrors()">Cancel</button>
				</div>
			</form>

			<!-- Main Plant content -->
			<div v-else>
				<div class="flex flex-col sm:flex-row">
					<div class="flex-initial w-full px-2">
						<p class="text-3xl font-black text-gray-900">{{ plant.name }}</p>
						<p class="text-lg text-gray-600">{{ plant.variety }}</p>

						<div class="flex">
							<p class="py-1 px-2 border-solid border-2 border-green-600 rounded mt-4 mt-4 text-lg text-gray-900"><span
									class="block text-sm font-black text-green-600">Time to
									Maturity</span>
								{{ plant.days_to_mature }} days
							</p>

							<p class="py-1 px-2 border-solid border-2 border-green-600 rounded mt-4 ml-5 text-lg text-gray-900"><span
									class="block text-sm font-black text-green-600">Quantity</span>
								x{{ plant.quantity }}
							</p>
						</div>


						<p class="py-1 px-2 border-solid border-2 border-green-600 rounded mt-4 mt-4 text-lg text-gray-900"><span
								class="block text-sm font-black text-green-600">Date
								Planted</span>
							{{ dayjs(plant.date_planted).format('LL') }}
						</p>

						<p class="py-2 px-2 border-solid border-2 border-green-600 rounded mt-4 mt-4 text-lg text-gray-900 relative">
							<span class="block text-sm font-black text-green-600">Est. Harvest Date:
								<strong v-if="harvestDateIsPastOrToday"
									class="px-2 py-1 mt-2 font-black bg-gray-900 text-white absolute top-2 right-1 text-lg">HARVEST
									TIME</strong></span>
							{{ dayjs(plant.harvest_date).format('LL') }}
						</p>
					</div>

					<div class="flex-initial w-full p-2 order-first sm:order-last">
						<!-- <img v-bind:src="{'storage/'.plant.file_input" /> -->
						<img class="w-full" v-bind:src="'storage/images/' + plant.file_input" />
					</div>
				</div>

				<div class="w-full px-2">
					<p class="py-2 px-2 border-solid border-2 border-green-600 rounded mt-4 mt-4 text-lg text-gray-900 relative">
						<span class="block text-sm font-black text-green-600">Stages of Growth:</span>
					<ul v-if="plant.stages !== null || plant.stages.length !== 0" class="mt-4">
						<li v-for="(stage, index) in  plant.stages " :key="plant.stages" :stage="stage">
							<p>{{ stage.name }} Stage: <span v-if="stage.duration">( {{ stage.duration }} )</span></p>

							<p v-if="stage.watering" class="text-xs">
								<strong class="">Watering Schedule:</strong> {{ stage.watering }}
							</p>
							<p v-if="stage.fertilizing" class="text-xs">
								<strong class="">Fertilization Schedule:</strong> {{ stage.fertilizing }}
							</p>
							<p v-if="stage.spacing" class="text-xs">
								<strong class="">Spacing:</strong> {{ stage.spacing }}
							</p>
							<p v-if="stage.lighting" class="text-xs">
								<strong class="">Lighting:</strong> {{ stage.lighting }}
							</p>

						</li>
					</ul>
					<ul v-else>
						<li class="text-lg text-gray-600">No stages have been added yet.</li>
					</ul>
					</p>
				</div>

			</div>

			<div class="flex flex-end justify-between items-center">
				<div>
					<small v-if="plant.created_at !== plant.updated_at" class="text-sm text-gray-600"> &middot; edited</small>
				</div>
				<Dropdown v-if="plant.user.id === $page.props.auth.user.id">
					<template #trigger>
						<button>
							<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20"
								fill="currentColor">
								<path
									d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
							</svg>
						</button>
					</template>
					<template #content>
						<button
							class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-100 transition duration-150 ease-in-out"
							@click="editing = true">
							Edit
						</button>
						<DropdownLink as="button" :href="route('plants.destroy', plant.id)" method="delete">
							Delete
						</DropdownLink>
					</template>
				</Dropdown>
			</div>
		</div>
	</div>
</template>