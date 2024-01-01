<script setup>
import { defineProps, ref } from 'vue';
import AdsFilters from './AdsFilters.vue';
import AdsCard from './AdsCard.vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';

const props                 = defineProps(['announcements', 'adscategories']);
const filteredAnnouncements = ref([]);
const showFiltered          = ref(false);
const currentPage = ref(1);

const applyFilters = async (filters) => {
    try {
        const response = await axios.post(`/announcements/filters?page=${currentPage.value}`, filters);
        filteredAnnouncements.value = response.data;
        showFiltered.value = true;

    } catch (error) {
        console.error('Erreur lors de la récupération des annonces filtrées', error);
    }
};

const changePage = async (page, filters) => {
    currentPage.value = page;
    await applyFilters(filters);
};


</script>

<template>
    <AdsFilters @applyFilters="applyFilters" :adscategories="props.adscategories" />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-4">
                <div class="space-y">
                    <div v-for="announcement in (showFiltered ? filteredAnnouncements.data : props.announcements.data)" :key="announcement.id" class="card">
                        <AdsCard :announcement="announcement"/>
                    </div>
                    <Bootstrap5Pagination
                        :data="showFiltered ? filteredAnnouncements : props.announcements"
                        :limit="5"
                        :align="'center'"
                        @pagination-change-page="changePage"
                    />

                </div>
            </div>
        </div>
    </div>
</template>

