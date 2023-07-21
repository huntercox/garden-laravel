<script setup>
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

const harvestDate = ref(dayjs(props.plant.harvest_date));
const harvestDateIsPastOrToday = ref(false);

onMounted(() => {
	harvestDateIsPastOrToday.value = harvestDate.value.isSameOrBefore(dayjs());
})
</script>


<template>
	<a :href="`/plants/${plant.id}`">{{ plant.name }}</a>
</template>