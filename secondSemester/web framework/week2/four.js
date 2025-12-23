const fs = require('fs').promises;

async function readFileExample() {
    console.log("Start reading file...");
    try {
        const data = await fs.readFile('example.txt', 'utf8');
        console.log("File contents:", data);
    } catch (err) {
        console.error("Error reading file:", err);
    }
    console.log("File read completed");
}

readFileExample();