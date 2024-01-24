<script setup>
import { defineProps, ref } from 'vue';
import AdsFilters from './AdsFilters.vue';
import AdsCard from './AdsCard.vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';

const props                 = defineProps(['ads', 'adscategories']);
const filteredAnnouncements = ref([]);
const showFiltered          = ref(false);
const currentPage = ref(1);

const applyFilters = async (filters) => {
    try {
        const response = await axios.post(`/ads/filters?page=${currentPage.value}`, filters);
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
                    <div v-for="ad in (showFiltered ? filteredAnnouncements.data : props.ads.data)" :key="ad.id" class="card">
                        <AdsCard :ad="ad"/>
                    </div>
                    <Bootstrap5Pagination
                        :data="showFiltered ? filteredAnnouncements : props.ads"
                        :limit="5"
                        :align="'center'"
                        @pagination-change-page="changePage"
                    />

                </div>
            </div>
        </div>
    </div>
</template>

