<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Database</title>
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
</head>
<body>
    <h1>Welcome to Students Database</h1>
    
    
    <nav>
        <a href="/">Home</a> |
        <a href="/students">Students</a> |
        <a href="/add">Add Student</a>
    </nav>
    
    
    <?php if(isset($students) && count($students) > 0): ?>
        <h2>Students List:</h2>
        <ul>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($student['name'] ?? $student->name); ?> - <?php echo e($student['email'] ?? $student->email); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php else: ?>
        <p>No students found.</p>
    <?php endif; ?>
    
</body>
</html><?php /**PATH C:\xampp\htdocs\week8\Workshop\app\views/index.blade.php ENDPATH**/ ?>