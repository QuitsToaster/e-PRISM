@extends('layouts.app')

@section('title', 'Submit Research')

@section('content')
<div class="max-w-6xl mx-auto mt-10">

    <!-- HEADER -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl p-8 shadow-lg mb-10">
        <h1 class="text-3xl font-extrabold">Submit Research</h1>
        <p class="text-indigo-100 mt-2">
            Choose what you want to submit, then complete the required fields.
        </p>
    </div>

    <!-- STEP 1 -->
    <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
        <h2 class="text-xl font-bold mb-4">What would you like to submit?</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <button id="btnProposal"
                class="border-2 border-indigo-500 text-indigo-600 p-6 rounded-xl hover:bg-indigo-50 font-semibold">
                📄 Research Proposal
            </button>

            <button id="btnCompleted"
                class="border-2 border-green-500 text-green-600 p-6 rounded-xl hover:bg-green-50 font-semibold">
                ✅ Completed Research
            </button>
        </div>
    </div>

    <!-- FORM -->
    <div id="submissionForm" class="bg-white p-8 rounded-xl shadow-lg hidden">
        <form method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <input type="hidden" id="classification" name="classification">

            <!-- TYPE -->
            <div>
                <label class="font-semibold">Type of Research</label>
                <select id="researchType" name="research_type"
                        class="w-full mt-2 border p-3 rounded-lg">
                    <option selected disabled>Select type</option>
                    <option value="action">Action Research</option>
                    <option value="basic">Basic Research</option>
                </select>
            </div>

            <!-- PROPONENTS -->
            <div>
                <label class="font-semibold mb-2 block">Proponents (Max 5)</label>

                <div id="proponents" class="space-y-4"></div>

                <button type="button" id="addProponent"
                        class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg">
                    + Add Proponent
                </button>
            </div>

            <!-- COMMON -->
            <div class="grid md:grid-cols-2 gap-4">
                <input name="school" placeholder="School / Station" class="border p-3 rounded-lg">
                <input name="school_id" placeholder="School ID (Optional)" class="border p-3 rounded-lg">
            </div>

            <input name="title" placeholder="Title of the Study" class="border p-3 rounded-lg w-full">

            <!-- CHAPTERS -->
            <div id="chapters" class="space-y-10"></div>

            <!-- ATTACHMENTS -->
            <div>
                <label class="font-semibold">Attachments (PDF only)</label>
                <input type="file" name="attachments[]" multiple accept=".pdf"
                       class="border p-2 rounded-lg w-full">
            </div>

            <!-- ACTIONS -->
            <div class="flex gap-4">
                <button class="bg-gray-600 text-white px-6 py-3 rounded-lg">Save Draft</button>
                <button class="bg-green-600 text-white px-6 py-3 rounded-lg">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
let proponentCount = 0;
const maxProponents = 5;

const proponentsDiv = document.getElementById('proponents');
const chaptersDiv = document.getElementById('chapters');
const researchType = document.getElementById('researchType');
const classification = document.getElementById('classification');
const form = document.getElementById('submissionForm');

/* SHOW FORM */
btnProposal.onclick = () => {
    classification.value = 'proposal';
    form.classList.remove('hidden');
};

btnCompleted.onclick = () => {
    classification.value = 'completed';
    form.classList.remove('hidden');
};

/* ADD PROPONENT WITH PHOTO */
addProponent.onclick = () => {
    if (proponentCount >= maxProponents) return;

    proponentsDiv.insertAdjacentHTML('beforeend', `
        <div class="border rounded-lg p-4 relative bg-gray-50">
            <div class="grid md:grid-cols-3 gap-3">
                <input name="proponents[${proponentCount}][name]"
                       placeholder="Full Name"
                       class="border p-2 rounded" required>

                <input name="proponents[${proponentCount}][position]"
                       placeholder="Position (Plantilla)"
                       class="border p-2 rounded" required>

                <input type="file"
                       name="proponents[${proponentCount}][photo]"
                       accept="image/*"
                       class="border p-2 rounded" required>
            </div>

            <button type="button"
                    onclick="this.parentElement.remove(); proponentCount--;"
                    class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-sm">
                Remove
            </button>
        </div>
    `);

    proponentCount++;
};

/* CHAPTER STRUCTURE */
const chapterMap = {
    proposal: {
        action: [
            { title: "Chapter I. Context and Rationale" },
            { title: "Chapter II. Action Research Questions" },
            { title: "Chapter III. Proposed Innovation, Intervention, and Strategy" },
            {
                title: "Chapter IV. Action Research Methods",
                subs: [
                    "a. Participants and/or Other Sources of Data",
                    "b. Data Gathering Methods",
                    "c. Ethical Issues",
                    "d. Data Analysis Plan"
                ]
            },
            { title: "Chapter V. Work Plan and Timelines (Tabular)" },
            { title: "Chapter VI. Cost Estimates (Tabular)" },
            { title: "Chapter VII. Dissemination and Utilization Plan" },
            { title: "Chapter VIII. References" }
        ],
        basic: [
            { title: "Chapter I. Introduction and Rationale" },
            { title: "Chapter II. Literature Review and Studies" },
            { title: "Chapter III. Research Questions" },
            { title: "Chapter IV. Scope and Limitation" },
            {
                title: "Chapter V. Research Methodology",
                subs: [
                    "a. Sampling Method",
                    "b. Data Collection Methods",
                    "c. Ethical Considerations",
                    "d. Plan for Data Analysis"
                ]
            },
            { title: "Chapter VI. Timetable (Tabular)" },
            { title: "Chapter VII. Cost Estimates (Tabular)" },
            { title: "Chapter VIII. Dissemination Plan" },
            { title: "Chapter IX. References" }
        ]
    },
    completed: {
        action: [
            { title: "Chapter I. Context and Rationale" },
            { title: "Chapter II. Action Research Questions" },
            { title: "Chapter III. Proposed Innovation" },
            {
                title: "Chapter IV. Action Research Methods",
                subs: [
                    "a. Participants",
                    "b. Data Gathering Methods",
                    "c. Ethical Issues",
                    "d. Data Analysis Plan"
                ]
            },
            { title: "Chapter V. Discussion of Results and Reflection" },
            { title: "Conclusions" },
            { title: "Recommendations" },
            { title: "Reflection" },
            { title: "Chapter VI. Action Plan" },
            { title: "Chapter VII. References" },
            { title: "Chapter VIII. Financial Report (Tabular)" }
        ],
        basic: [
            { title: "Chapter I. Introduction and Rationale" },
            { title: "Chapter II. Literature Review" },
            { title: "Chapter III. Research Questions" },
            { title: "Chapter IV. Scope and Limitation" },
            {
                title: "Chapter V. Research Methodology",
                subs: [
                    "a. Sampling Method",
                    "b. Data Collection Methods",
                    "c. Ethical Considerations",
                    "d. Data Analysis Plan"
                ]
            },
            { title: "Chapter VI. Discussion of Results" },
            { title: "Conclusions" },
            { title: "Recommendations" },
            { title: "Reflection" },
            { title: "Chapter VII. Dissemination Plan" },
            { title: "Chapter VIII. References" },
            { title: "Chapter IX. Financial Report" }
        ]
    }
};

/* LOAD CHAPTERS */
researchType.onchange = () => {
    chaptersDiv.innerHTML = '';

    if (!classification.value) return;

    const list = chapterMap[classification.value][researchType.value];

    list.forEach((ch, i) => {
        let html = `
            <div>
                <h3 class="font-bold text-lg mb-2">${ch.title}</h3>
                <textarea name="chapters[${i}][main]"
                          rows="4"
                          class="w-full border p-3 rounded-lg mb-3"></textarea>
        `;

        if (ch.subs) {
            ch.subs.forEach((sub, j) => {
                html += `
                    <label class="text-sm font-semibold">${sub}</label>
                    <textarea name="chapters[${i}][subs][${j}]"
                              rows="3"
                              class="w-full border p-3 rounded-lg mb-3"></textarea>
                `;
            });
        }

        html += `</div>`;
        chaptersDiv.insertAdjacentHTML('beforeend', html);
    });
};
</script>
@endsection