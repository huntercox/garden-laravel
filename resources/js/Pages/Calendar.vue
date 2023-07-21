<script setup>
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps(['plants']);


const events = props.plants.map(function (plant, index) {
	return { title: plant.name, date: plant.harvest_date }
});


function handleDateClick(arg) {
	alert('date click! ' + arg.dateStr)
}
const calendarOptions = ref({
	plugins: [dayGridPlugin, interactionPlugin],
	initialView: 'dayGridMonth',
	dateClick: handleDateClick,
	events: events
});
</script>
<template>
	<Head title="Calendar" />
	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Calendar</h2>
		</template>
		<div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">
			<div class="mt-6 shadow-sm rounded-lg">
				<FullCalendar :options="calendarOptions" />
			</div>
		</div>
	</AuthenticatedLayout>
</template>