function task1() {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve("Task 1 finished");
        }, 20000);
    });
}

function task2() {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve("Task 2 finished");
        }, 10000);
    });
}

Promise.all([task1(), task2()])
    .then((results) => {
        console.log("All tasks completed");
        console.log(results);
    })
    .catch((error) => {
        console.error("Error:", error);
    });
