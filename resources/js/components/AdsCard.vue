<script setup>
import { computed, defineProps } from 'vue';
import { format } from 'date-fns';

const props = defineProps(['announcement']);

const backgroundImageStyle = computed(() => (image) => ({
    backgroundImage: `url('${getImageUrl(image)}')`,
}));

const getImageUrl = (image) => {
    return image.startsWith('images/default-image.jpg') ? image : `storage/${image}`;
};

const formatCreatedAt = (createdAt) => {
    return format(new Date(createdAt), 'dd/MM/yyyy');
};
</script>

<template>
    <div class="row g-0">
        <div class="col-auto">
            <div class="card-body">
                <div class="avatar avatar-xl" v-if="announcement.image" :style="backgroundImageStyle(announcement.image)"></div>
            </div>
        </div>
        <div class="col">
            <div class="card-body ps-0">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-0"><a :href="'/announcements/' + announcement.id">{{ announcement.title }}</a></h3>
                        <p v-html="announcement.description"></p>
                    </div>
                    <div class="col-auto fs-3 text-green">{{ announcement.budget }} €</div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                            <div class="list-inline-item">
                                <i class="ti ti-user"></i>
                                <span class="fs-5">{{ announcement.user.name }}</span>
                            </div>
                            <div class="list-inline-item">
                                <i class="ti ti-calendar-event"></i>
                                <span class="fs-5">{{ formatCreatedAt(announcement.created_at) }}</span>
                            </div>
                        </div>
                        <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                            <!-- Ici, vous pouvez inclure des informations supplémentaires pour les écrans de petite taille -->
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <div class="mt-3 badges">
                            <span v-for="category in announcement.categories" :key="category.id"
                               class="badge badge-outline text-blue fw-normal badge-pill me-1">
                                {{ category.name }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
