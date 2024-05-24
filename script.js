function toggleSection(sectionClass) {
    const assignedSection = document.querySelector('.t-asignadas');
    const unassignedSection = document.querySelector('.t-noasignadas');

    if (sectionClass === 't-asignadas') {
        if (assignedSection.classList.contains('active')) {
            assignedSection.classList.remove('active');
        } else {
            assignedSection.classList.add('active');
            unassignedSection.classList.remove('active');
        }
    } else if (sectionClass === 't-noasignadas') {
        if (unassignedSection.classList.contains('active')) {
            unassignedSection.classList.remove('active');
        } else {
            unassignedSection.classList.add('active');
            assignedSection.classList.remove('active');
        }
    }
}
