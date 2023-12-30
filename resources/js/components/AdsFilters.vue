<script setup>
import {defineProps, onMounted, ref} from 'vue';

const props      = defineProps(['adscategories']);
const categories = ref('');
const minBudget  = ref('');
const maxBudget  = ref('');
const adsOrder   = ref('');
const emit       = defineEmits(['applyFilters']);


onMounted(() => {
    const tomSelect = new TomSelect("#categories", {
        maxItems: 3,
        controlInput: '<input>',
        plugins: ['input_autogrow']
    });

    tomSelect.on('change', (value) => {
        categories.value = value;
    });

});
const applyFilters = () => {
    const filters = {
        categories: categories.value,
        minBudget: minBudget.value,
        maxBudget: maxBudget.value,
        adsOrder: adsOrder.value,
    };

    emit('applyFilters', filters);
};
</script>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 filter-bar d-flex align-items-center justify-content-sm-evenly">

                <div class="filter-section">
                    <select class="form-select" id="categories"  v-model="categories" name="categories[]"  autocomplete="off" multiple>
                        <option disabled value="" selected hidden>Catégories</option>
                        <option v-for="category in props.adscategories" :key="category.id" :value="category.name">
                            {{ category.name }}
                        </option>
                    </select>
                </div>

                <div class="filter-section">
                    <input class="form-control" name="minBudget" v-model="minBudget" value="0" placeholder="Budget minimum" type="number" id="minBudget">
                </div>

                <div class="filter-section">
                    <input class="form-control" name="maxBudget" v-model="maxBudget" placeholder="Budget maximum" type="number" id="maxBudget">
                </div>

                <div class="filter-section">
                    <select class="form-select" id="adsOrder" v-model="adsOrder" name="adsOrder" autocomplete="off">
                        <option readonly value="" selected hidden>Date de parution</option>
                        <option value="desc">Plus récent</option>
                        <option value="asc">Plus ancien</option>
                    </select>
                </div>

                <div class="filter-section">
                    <button class="btn btn-primary" @click="applyFilters">Appliquer</button>
                </div>
            </div>
        </div>
    </div>
</template>
