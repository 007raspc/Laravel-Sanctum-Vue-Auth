<template>
    <aside class="db-sidebar">
        <div class="offcanvas-lg start" tabindex="-1" id="bdSidebar"
             aria-labelledby="bdSidebarOffcanvasLabel">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="bdSidebarOffcanvasLabel">Browse docs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
                        data-bs-target="#bdSidebar"></button>
            </div>
            <div class="offcanvas-body">
                <nav class="sidebar-links w-100">
                    <div class="list-group">
                        <router-link class="list-group-item list-group-item-action" :to="{name: 'dashboard'}">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </router-link>
                        <router-link class="list-group-item list-group-item-action" :to="{name: 'products.index'}">
                            <i class="bi bi-speedometer2"></i> Products
                        </router-link>
                        <a href="/" class="list-group-item list-group-item-action">
                            <i class="bi bi-tags"></i> Products Type
                        </a>
                        <a href="/stocks" class="list-group-item list-group-item-action">
                            <i class="bi bi-boxes"></i> Stocks
                        </a>
                        <a href="/prices" class="list-group-item list-group-item-action">
                            <i class="bi bi-calculator"></i> Prices
                        </a>
                        <a href="/analytics" class="list-group-item list-group-item-action">
                            <i class="bi bi-graph-up"></i> Analytics
                        </a>
                        <a href="/settings" class="list-group-item list-group-item-action">
                            <i class="bi bi-gear"></i> Settings
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </aside>

</template>

<script>
export default {
    name: "left-side"
}
</script>

<style scoped>

</style>
