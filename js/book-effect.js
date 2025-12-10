// 3D Book Effects Module
const BookEffects = {
    bookElement: null,
    leftPage: null,
    rightPage: null,
    isOpen: false,
    isAnimating: false,
    
    init() {
        this.bookElement = document.getElementById('bookElement');
        this.leftPage = document.getElementById('leftPage');
        this.rightPage = document.getElementById('rightPage');
        
        // Set initial state
        this.toggleBookView();
        
        // Add CSS for page turning animation
        this.addPageTurnStyles();
    },
    
    addPageTurnStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .page-turn {
                animation: pageTurn 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
                z-index: 100;
            }
            
            @keyframes pageTurn {
                0% { transform: rotateY(0deg); }
                50% { transform: rotateY(-90deg); }
                100% { transform: rotateY(-180deg); }
            }
            
            .page-turn-back {
                animation: pageTurnBack 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
            }
            
            @keyframes pageTurnBack {
                0% { transform: rotateY(-180deg); }
                50% { transform: rotateY(-90deg); }
                100% { transform: rotateY(0deg); }
            }
            
            .book-shadow {
                filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.3));
            }
            
            .paper-texture {
                background-image: 
                    linear-gradient(90deg, transparent 98%, rgba(0,0,0,0.03) 100%),
                    linear-gradient(rgba(0,0,0,0.03) 1px, transparent 1px);
                background-size: 100% 30px, 100% 30px;
            }
        `;
        document.head.appendChild(style);
    },
    
    toggleBookView() {
        if (this.isAnimating) return;
        
        this.isAnimating = true;
        this.isOpen = !this.isOpen;
        
        if (this.isOpen) {
            this.bookElement.classList.add('open');
            this.bookElement.classList.add('book-shadow');
            
            // Add paper texture
            this.leftPage.classList.add('paper-texture');
            this.rightPage.classList.add('paper-texture');
        } else {
            this.bookElement.classList.remove('open');
            this.bookElement.classList.remove('book-shadow');
            
            // Remove paper texture
            this.leftPage.classList.remove('paper-texture');
            this.rightPage.classList.remove('paper-texture');
        }
        
        setTimeout(() => {
            this.isAnimating = false;
        }, 800);
    },
    
    turnPage(direction) {
        if (this.isAnimating) return;
        
        this.isAnimating = true;
        const page = direction === 'next' ? this.rightPage : this.leftPage;
        
        page.classList.add(direction === 'next' ? 'page-turn' : 'page-turn-back');
        
        setTimeout(() => {
            page.classList.remove('page-turn', 'page-turn-back');
            this.isAnimating = false;
        }, 800);
    },
    
    setBookAngle(angle) {
        const clampedAngle = Math.max(-45, Math.min(45, angle));
        this.bookElement.style.transform = `rotateY(${clampedAngle}deg)`;
    },
    
    addDepthEffect() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const depth = entry.intersectionRatio;
                    this.setBookAngle(-30 * (1 - depth));
                }
            });
        }, {
            threshold: Array.from({ length: 100 }, (_, i) => i / 100)
        });
        
        if (this.bookElement) {
            observer.observe(this.bookElement);
        }
    },
    
    addPageFlipSound() {
        // Optional: Add page flip sound effect
        const flipSound = new Audio('https://assets.mixkit.co/sfx/preview/mixkit-book-page-flip-302.mp3');
        flipSound.volume = 0.3;
        
        // Add sound to page turn buttons
        document.addEventListener('click', (e) => {
            if (e.target.closest('.page-nav-btn') || e.target.closest('.page-btn')) {
                flipSound.currentTime = 0;
                flipSound.play().catch(() => {
                    // Ignore autoplay restrictions
                });
            }
        });
    },
    
    addHoverEffects() {
        const pages = [this.leftPage, this.rightPage];
        
        pages.forEach(page => {
            if (!page) return;
            
            page.addEventListener('mouseenter', () => {
                page.style.filter = 'brightness(1.02)';
                page.style.boxShadow = 'inset 0 0 30px rgba(212, 175, 55, 0.1)';
            });
            
            page.addEventListener('mouseleave', () => {
                page.style.filter = 'brightness(1)';
                page.style.boxShadow = 'inset 0 0 20px rgba(0, 0, 0, 0.1)';
            });
        });
    }
};

export default BookEffects;