// function updateSingleImages() {
//     const lbSingles = document.querySelectorAll('a.lb-single');
//     for (let i = 0; i < lbSingles.length; i++) {
//         lbSingles[i].setAttribute('data-fslightbox', '_thm_lb_single' + '_' + i);
//     }
// }

function updateGroupImages() {
    const lbGroups = document.querySelectorAll('.entry-content');
    for (let i = 0; i < lbGroups.length; i++) {
        let groupImages = lbGroups[i].querySelectorAll("figure > a");
        for (let j = 0; j < groupImages.length; j++) {
            groupImages[j].setAttribute('data-fslightbox', 'lb');
        }
    }
}

// updateSingleImages();
updateGroupImages();
refreshFsLightbox();
