<div class="row">
    <!-- Gebruikers Card -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                Total Users: <strong>{{ $totalUsers }}</strong>
                <div class="small mt-2">
                    Active: <strong>{{ $activeUsers }}</strong> | Inactive: <strong>{{ $inactiveUsers }}</strong>
                </div>
            </div>
        </div>
    </div>
    <!-- Posts Card -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">
                Total Posts: <strong>{{ $totalPosts }}</strong>
                <div class="small mt-2">
                    Published: <strong>{{ $publishedPosts }}</strong> | Unpublished: <strong>{{ $unpublishedPosts }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
