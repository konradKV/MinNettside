<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft Nexus</title>
    <style>
        :root {
            --primary-color: #ffffff;
            --bg-color: #121212;
            --accent-color: #444444;
            --hover-color: #666666;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--bg-color);
            color: var(--primary-color);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        header {
            padding: 2rem 0;
            position: relative;
            overflow: hidden;
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 2px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .logo:hover {
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        
        .nav-links a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            padding: 0.5rem 0;
            transition: all 0.3s ease;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 2px;
            background-color: var(--primary-color);
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .hero {
            min-height: 80vh;
            display: flex;
            align-items: center;
            position: relative;
            padding: 2rem 0;
        }
        
        .hero-content {
            width: 60%;
            z-index: 2;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            line-height: 1.2;
            animation: fadeIn 1s ease-out;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.8;
            animation: fadeIn 1s ease-out 0.3s forwards;
            opacity: 0;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .btn {
            display: inline-block;
            padding: 0.8rem 2rem;
            background-color: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 0%;
            height: 100%;
            background-color: var(--primary-color);
            transition: all 0.3s ease;
            z-index: -1;
        }
        
        .btn:hover {
            color: var(--bg-color);
        }
        
        .btn:hover::before {
            width: 100%;
        }
        
        .grid-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 4rem 0;
        }
        
        .card {
            background-color: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .card h3 {
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }
        
        .card h3::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--primary-color);
        }
        
        .card p {
            margin-bottom: 1.5rem;
            opacity: 0.8;
            flex-grow: 1;
        }
        
        .pixel-grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }
        
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 100;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .modal.active {
            opacity: 1;
            visibility: visible;
        }
        
        .modal-content {
            background-color: var(--bg-color);
            padding: 2rem;
            border-radius: 5px;
            width: 80%;
            max-width: 800px;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
            transform: scale(0.8);
            transition: all 0.3s ease;
        }
        
        .modal.active .modal-content {
            transform: scale(1);
        }
        
        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            color: var(--primary-color);
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        section {
            padding: 4rem 0;
        }
        
        section h2 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            position: relative;
            display: inline-block;
        }
        
        section h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100px;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        .interactive-block {
            background-color: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 5px;
            margin: 2rem 0;
            position: relative;
            overflow: hidden;
        }
        
        .block-elements {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .block {
            width: 100px;
            height: 100px;
            background-color: var(--accent-color);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .block:hover {
            background-color: var(--hover-color);
            transform: translateY(-5px);
        }
        
        footer {
            padding: 2rem 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }
        
        footer p {
            opacity: 0.7;
        }
        
        /* Animation for pixel grid */
        @keyframes pulse {
            0% {
                opacity: 0.1;
            }
            50% {
                opacity: 0.3;
            }
            100% {
                opacity: 0.1;
            }
        }
        
        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .hero-content {
                width: 100%;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .nav-links {
                gap: 1rem;
            }
            
            .block {
                width: 80px;
                height: 80px;
            }
            
            #minecraft-demo {
                height: 300px !important;
            }
            
            .game-controls {
                flex-direction: column;
            }
        }
        
        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--bg-color);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--accent-color);
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--hover-color);
        }
        
        /* Minecraft Demo Section */
        #minecraft-demo-section {
            margin-top: 3rem;
            margin-bottom: 3rem;
        }
        
        #minecraft-demo {
            width: 100%;
            height: 500px;
            position: relative;
            overflow: hidden;
            background-color: #87CEEB;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }
        
        .game-canvas {
            width: 100%;
            height: 100%;
        }
        
        .game-controls {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
            gap: 1rem;
        }
        
        .game-controls .btn {
            flex: 1;
            text-align: center;
        }
        
        .inventory {
            display: flex;
            gap: 5px;
            margin-top: 1rem;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 5px;
            justify-content: center;
        }
        
        .inventory-item {
            width: 50px;
            height: 50px;
            background-color: #555;
            border: 2px solid #777;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .inventory-item:hover, .inventory-item.selected {
            border-color: #fff;
            transform: translateY(-3px);
        }
        
        .instructions {
            margin-top: 1rem;
            padding: 1rem;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 5px;
        }
        
        .instructions h4 {
            margin-bottom: 0.5rem;
        }
        
        .crosshair {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            transform: translate(-50%, -50%);
            pointer-events: none;
            z-index: 10;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <div class="logo">MINECRAFT NEXUS</div>
                <div class="nav-links">
                    <a href="#about">About</a>
                    <a href="#features">Features</a>
                    <a href="#minecraft-demo-section">Play Demo</a>
                    <a href="#interactive">Interactive</a>
                    <a href="#crafting">Crafting</a>
                </div>
            </nav>
            
            <div class="hero">
                <div class="hero-content">
                    <h1>Explore. Build. Survive.</h1>
                    <p>Dive into the boundless world of Minecraft where imagination is your only limit. From towering fortresses to intricate redstone contraptions, your journey awaits.</p>
                    <a href="#minecraft-demo-section" class="btn">Play Demo</a>
                </div>
                <div class="pixel-grid" id="pixelGrid"></div>
            </div>
        </header>
        
        <!-- Minecraft Demo Section -->
        <section id="minecraft-demo-section">
            <h2>Play Minecraft Demo</h2>
            <p>Experience a simplified version of Minecraft right in your browser! Use WASD to move, click to break blocks, and right-click to place them.</p>
            
            <div id="minecraft-demo">
                <canvas id="game-canvas" class="game-canvas"></canvas>
                <div class="crosshair">✜</div>
            </div>
            
            <div class="inventory">
                <div class="inventory-item selected" data-block="grass">
                    <div style="width: 100%; height: 100%; background: linear-gradient(to bottom, #7CFC00 0%, #7CFC00 70%, #8B4513 70%, #8B4513 100%)"></div>
                </div>
                <div class="inventory-item" data-block="dirt">
                    <div style="width: 100%; height: 100%; background-color: #8B4513"></div>
                </div>
                <div class="inventory-item" data-block="stone">
                    <div style="width: 100%; height: 100%; background-color: #808080"></div>
                </div>
                <div class="inventory-item" data-block="wood">
                    <div style="width: 100%; height: 100%; background-color: #A0522D"></div>
                </div>
                <div class="inventory-item" data-block="leaves">
                    <div style="width: 100%; height: 100%; background-color: #228B22"></div>
                </div>
            </div>
            
            <div class="game-controls">
                <button id="reset-world" class="btn">Reset World</button>
                <button id="toggle-fullscreen" class="btn">Fullscreen</button>
            </div>
            
            <div class="instructions">
                <h4>Controls:</h4>
                <p>W, A, S, D - Move | SPACE - Jump | Mouse - Look around | Left Click - Break block | Right Click - Place block</p>
                <p>Select different block types from the inventory bar above.</p>
            </div>
        </section>
        
        <section id="about">
            <h2>About Minecraft</h2>
            <p>Minecraft is a sandbox video game developed by Mojang Studios. The game was created by Markus "Notch" Persson in the Java programming language and was released as a public alpha for personal computers in 2009 before officially releasing in November 2011, with Jens Bergensten taking over development.</p>
            <p>The game allows players to build with a variety of different blocks in a 3D procedurally generated world, requiring creativity from players. Other activities in the game include exploration, resource gathering, crafting, and combat.</p>
            
            <div class="grid-section">
                <div class="card" data-modal="worlds">
                    <h3>Diverse Worlds</h3>
                    <p>From lush forests to scorching deserts, freezing tundras to deep oceans, Minecraft offers a variety of biomes to explore and settle in.</p>
                    <a href="#" class="btn">Learn More</a>
                </div>
                <div class="card" data-modal="building">
                    <h3>Unlimited Building</h3>
                    <p>With hundreds of unique blocks and items, your creativity knows no bounds. Construct magnificent structures, functional machines, or cozy homes.</p>
                    <a href="#" class="btn">Learn More</a>
                </div>
                <div class="card" data-modal="survival">
                    <h3>Survival Challenges</h3>
                    <p>Brave the night against hostile mobs, manage hunger and health, and embark on a journey to defeat the Ender Dragon in this epic adventure.</p>
                    <a href="#" class="btn">Learn More</a>
                </div>
            </div>
        </section>
        
        <section id="features">
            <h2>Key Features</h2>
            <div class="grid-section">
                <div class="card">
                    <h3>Redstone Mechanics</h3>
                    <p>Build complex machines, automated systems, and even computers using Minecraft's unique redstone circuits and mechanisms.</p>
                </div>
                <div class="card">
                    <h3>Multiplayer Experience</h3>
                    <p>Join friends to build collaborative projects, engage in friendly competition, or simply explore the vast landscapes together.</p>
                </div>
                <div class="card">
                    <h3>Modding Community</h3>
                    <p>Enhance your gameplay with thousands of community-created modifications that add new content, mechanics, and visual improvements.</p>
                </div>
                <div class="card">
                    <h3>Cross-Platform Play</h3>
                    <p>Connect with players across multiple devices including PCs, consoles, and mobile devices with Bedrock Edition's cross-platform compatibility.</p>
                </div>
            </div>
        </section>
        
        <section id="interactive">
            <h2>Interactive Blocks</h2>
            <p>Click on blocks to see how they transform and interact with the environment. This demonstrates the fundamental mechanics that make Minecraft so engaging.</p>
            
            <div class="interactive-block">
                <h3>Click to Mine and Craft</h3>
                <div class="block-elements" id="blockElements">
                    <div class="block" data-type="stone">Stone</div>
                    <div class="block" data-type="wood">Wood</div>
                    <div class="block" data-type="dirt">Dirt</div>
                    <div class="block" data-type="water">Water</div>
                    <div class="block" data-type="lava">Lava</div>
                    <div class="block" data-type="diamond">Diamond</div>
                </div>
                <div id="blockInfo" style="margin-top: 2rem; display: none;">
                    <h4 id="blockTitle">Block Information</h4>
                    <p id="blockDescription">Click on a block to see details.</p>
                </div>
            </div>
        </section>
        
        <section id="crafting">
            <h2>Crafting System</h2>
            <p>Minecraft's crafting system allows players to combine raw materials into tools, weapons, armor, and decorative items. Below is an interactive demonstration of how crafting works.</p>
            
            <div class="interactive-block">
                <h3>Crafting Grid</h3>
                <p>Select materials on the left and see what you can craft:</p>
                <div id="craftingSystem" style="margin-top: 2rem;">
                    <div id="craftingGrid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; max-width: 300px; margin-bottom: 1rem;">
                        <div class="block" style="width: auto; height: 80px;" data-grid="0"></div>
                        <div class="block" style="width: auto; height: 80px;" data-grid="1"></div>
                        <div class="block" style="width: auto; height: 80px;" data-grid="2"></div>
                        <div class="block" style="width: auto; height: 80px;" data-grid="3"></div>
                        <div class="block" style="width: auto; height: 80px;" data-grid="4"></div>
                        <div class="block" style="width: auto; height: 80px;" data-grid="5"></div>
                        <div class="block" style="width: auto; height: 80px;" data-grid="6"></div>
                        <div class="block" style="width: auto; height: 80px;" data-grid="7"></div>
                        <div class="block" style="width: auto; height: 80px;" data-grid="8"></div>
                    </div>
                    <div id="craftingResult" style="margin-top: 1rem;">
                        <h4>Result:</h4>
                        <div class="block" style="margin-top: 0.5rem;">?</div>
                    </div>
                    <button id="clearCrafting" class="btn" style="margin-top: 1rem;">Clear Grid</button>
                </div>
            </div>
        </section>
    </div>
    
    <footer>
        <div class="container">
            <p>© 2025 Minecraft Nexus. This is a fan site and is not affiliated with Mojang Studios.</p>
        </div>
    </footer>
    
    <!-- Modals -->
    <div class="modal" id="worldsModal">
        <div class="modal-content">
            <button class="close-modal">&times;</button>
            <h2>Minecraft's Diverse Worlds</h2>
            <p>Minecraft's procedurally generated worlds create unique landscapes every time you start a new game. Each world can span over 60 million blocks in each direction, making them effectively infinite.</p>
            <h3>Key Biomes:</h3>
            <ul>
                <li><strong>Plains</strong>: Flat grasslands with flowers and villages</li>
                <li><strong>Forests</strong>: Dense woodlands with various tree types</li>
                <li><strong>Deserts</strong>: Sandy expanses with cacti and desert temples</li>
                <li><strong>Mountains</strong>: Towering peaks with spectacular views</li>
                <li><strong>Oceans</strong>: Vast bodies of water with underwater ruins and shipwrecks</li>
                <li><strong>The Nether</strong>: A hellish dimension with unique resources</li>
                <li><strong>The End</strong>: A mysterious void realm where the Ender Dragon dwells</li>
            </ul>
        </div>
    </div>
    
    <div class="modal" id="buildingModal">
        <div class="modal-content">
            <button class="close-modal">&times;</button>
            <h2>The Art of Building in Minecraft</h2>
            <p>Minecraft offers unparalleled creative freedom with its simple yet versatile building system. Players can place and destroy blocks at will, creating everything from simple shelters to elaborate castles, cities, or artistic masterpieces.</p>
            <h3>Building Techniques:</h3>
            <ul>
                <li><strong>Layering</strong>: Using different blocks to create depth and texture</li>
                <li><strong>Detailing</strong>: Adding small elements like stairs, slabs, and fences for realism</li>
                <li><strong>Scale</strong>: Understanding proportion for realistic or fantastical builds</li>
                <li><strong>Terrain Integration</strong>: Working with the natural landscape</li>
                <li><strong>Interior Design</strong>: Furnishing spaces for functionality and aesthetics</li>
            </ul>
            <p>Many players challenge themselves with massive build projects that can take months to complete, from recreations of real-world landmarks to entirely original fantasy worlds.</p>
        </div>
    </div>
    
    <div class="modal" id="survivalModal">
        <div class="modal-content">
            <button class="close-modal">&times;</button>
            <h2>Surviving in Minecraft</h2>
            <p>Survival mode is the core gameplay experience in Minecraft, challenging players to gather resources, build shelter, and defend against hostile creatures while exploring the world.</p>
            <h3>Survival Progression:</h3>
            <ol>
                <li><strong>Early Game</strong>: Gather wood, create basic tools, build a shelter, and secure food sources</li>
                <li><strong>Mid Game</strong>: Mining for valuable ores, creating farms, exploring dungeons, and enhancing equipment</li>
                <li><strong>Late Game</strong>: Enchanting gear, brewing potions, establishing infrastructure, and preparing for dimensional travel</li>
                <li><strong>End Game</strong>: Defeating the Ender Dragon, exploring End Cities, and obtaining the most powerful items</li>
            </ol>
            <p>The day-night cycle creates a natural rhythm of gameplay, with daytime devoted to exploration and building, while nighttime brings dangerous creatures that test your combat skills.</p>
        </div>
    </div>

    <script>
        // Pixel Grid Animation
        document.addEventListener('DOMContentLoaded', function() {
            // Create pixel grid
            const pixelGrid = document.getElementById('pixelGrid');
            const gridSize = 30; // Number of pixels in each direction
            
            for (let i = 0; i < gridSize; i++) {
                for (let j = 0; j < gridSize; j++) {
                    const pixel = document.createElement('div');
                    pixel.style.position = 'absolute';
                    pixel.style.width = '2px';
                    pixel.style.height = '2px';
                    pixel.style.backgroundColor = 'white';
                    pixel.style.left = (j * 100 / gridSize) + '%';
                    pixel.style.top = (i * 100 / gridSize) + '%';
                    pixel.style.opacity = '0.1';
                    pixel.style.animation = `pulse 3s infinite ${Math.random() * 3}s`;
                    pixelGrid.appendChild(pixel);
                }
            }
            
            // Modal functionality
            const cards = document.querySelectorAll('.card[data-modal]');
            const modals = document.querySelectorAll('.modal');
            const closeButtons = document.querySelectorAll('.close-modal');
            
            cards.forEach(card => {
                card.addEventListener('click', () => {
                    const modalId = card.getAttribute('data-modal') + 'Modal';
                    const modal = document.getElementById(modalId);
                    modal.classList.add('active');
                });
            });
            
            closeButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const modal = button.closest('.modal');
                    modal.classList.remove('active');
                });
            });
            
            window.addEventListener('click', (e) => {
                modals.forEach(modal => {
                    if (e.target === modal) {
                        modal.classList.remove('active');
                    }
                });
            });
            
            // Interactive blocks
            const blocks = document.querySelectorAll('.block[data-type]');
            const blockInfo = document.getElementById('blockInfo');
            const blockTitle = document.getElementById('blockTitle');
            const blockDescription = document.getElementById('blockDescription');
            
            const blockData = {
                stone: {
                    title: 'Stone',
                    description: 'A fundamental building block found abundantly underground. Can be smelted into smooth stone or crafted into tools and furnaces.'
                },
                wood: {
                    title: 'Wood',
                    description: 'Harvested from trees, wood is essential for crafting tools, weapons, and structures. Different tree types yield different wood varieties.'
                },
                dirt: {
                    title: 'Dirt',
                    description: 'Common block found near the surface. Can be tilled with a hoe to create farmland for growing crops.'
                },
                water: {
                    title: 'Water',
                    description: 'Fluid block that flows and can be collected with a bucket. Essential for farming, and provides protection against fall damage and fire.'
                },
                lava: {
                    title: 'Lava',
                    description: 'Dangerous fluid that causes fire damage. Can be used as a light source or fuel for furnaces. Found mainly underground and in the Nether.'
                },
                diamond: {
                    title: 'Diamond',
                    description: 'Rare and valuable mineral found deep underground. Used to craft the most durable tools, weapons, and armor in the game.'
                }
            };
            
            blocks.forEach(block => {
                block.addEventListener('click', () => {
                    const type = block.getAttribute('data-type');
                    blockTitle.textContent = blockData[type].title;
                    blockDescription.textContent = blockData[type].description;
                    blockInfo.style.display = 'block';
                    
                    // Visual effect
                    block.style.transform = 'scale(0.9)';
                    setTimeout(() => {
                        block.style.transform = 'translateY(-5px)';
                    }, 300);
                });
            });
            
            // Simple crafting system
            const craftingGrid = document.querySelectorAll('.block[data-grid]');
            const craftingResult = document.querySelector('#craftingResult .block');
            const clearCraftingBtn = document.getElementById('clearCrafting');
            
            const materials = ['wood', 'stone', 'diamond', 'dirt'];
            let currentMaterial = null;
            
            craftingGrid.forEach(cell => {
                cell.addEventListener('click', () => {
                    if (!currentMaterial) {
                        // Cycle through materials
                        const currentIndex = materials.indexOf(cell.textContent.toLowerCase());
                        const nextIndex = (currentIndex + 1) % materials.length;
                        currentMaterial = materials[nextIndex];
                    }
                    
                    cell.textContent = currentMaterial.charAt(0).toUpperCase() + currentMaterial.slice(1);
                    cell.style.backgroundColor = getColorForMaterial(currentMaterial);
                    
                    checkRecipe();
                    currentMaterial = null;
                });
            });
            
            clearCraftingBtn.addEventListener('click', () => {
                craftingGrid.forEach(cell => {
                    cell.textContent = '';
                    cell.style.backgroundColor = 'var(--accent-color)';
                });
                craftingResult.textContent = '?';
                craftingResult.style.backgroundColor = 'var(--accent-color)';
            });
            
            function getColorForMaterial(material) {
                switch(material) {
                    case 'wood': return '#8B4513';
                    case 'stone': return '#808080';
                    case 'diamond': return '#1EBBD7';
                    case 'dirt': return '#8B4513';
                    default: return 'var(--accent-color)';
                }
            }
            
            function checkRecipe() {
                // Get current grid state
                const grid = [];
                craftingGrid.forEach(cell => {
                    grid.push(cell.textContent.toLowerCase());
                });
                
                // Check for pick axe recipe (simplified)
                if (
                    grid[0] === 'wood' && grid[1] === 'wood' && grid[2] === 'wood' &&
                    grid[3] === '' && grid[4] === 'stone' && grid[5] === '' &&
                    grid[6] === '' && grid[7] === 'stone' && grid[8] === ''
                ) {
                    craftingResult.textContent = 'Wooden Pickaxe';
                    craftingResult.style.backgroundColor = '#8B4513';
                    return;
                }
                
                // Check for sword recipe (simplified)
                if (
                    grid[0] === '' && grid[1] === 'diamond' && grid[2] === '' &&
                    grid[3] === '' && grid[4] === 'diamond' && grid[5] === '' &&
                    grid[6] === '' && grid[7] === 'wood' && grid[8] === ''
                ) {
                    craftingResult.textContent = 'Diamond Sword';
                    craftingResult.style.backgroundColor = '#1EBBD7';
                    return;
                }
                
                // Check for chest recipe (simplified)
                if (
                    grid[0] === 'wood' && grid[1] === 'wood' && grid[2] === 'wood' &&
                    grid[3] === 'wood' && grid[4] === '' && grid[5] === 'wood' &&
                    grid[6] === 'wood' && grid[7] === 'wood' && grid[8] === 'wood'
                ) {
                    craftingResult.textContent = 'Chest';
                    craftingResult.style.backgroundColor = '#8B4513';
                    return;
                }
                
                // Default - no recipe
                craftingResult.textContent = '?';
                craftingResult.style.backgroundColor = 'var(--accent-color)';
            }
            
            // Cursor effects
            document.addEventListener('mousemove', function(e) {
                const cursor = e.clientX;
                const width = window.innerWidth;
                const ratio = cursor / width;
                
                // Subtle parallax effect on hero content
                const heroContent = document.querySelector('.hero-content');
                heroContent.style.transform = `translateX(${ratio * 20 - 10}px)`;
            });
            
            // Minecraft Demo
            const canvas = document.getElementById('game-canvas');
            const ctx = canvas.getContext('2d');
            const resetBtn = document.getElementById('reset-world');
            const fullscreenBtn = document.getElementById('toggle-fullscreen');
            const inventoryItems = document.querySelectorAll('.inventory-item');
            
            // Set canvas size
            function resizeCanvas() {
                canvas.width = canvas.offsetWidth;
                canvas.height = canvas.offsetHeight;
            }
            
            window.addEventListener('resize', resizeCanvas);
            resizeCanvas();
            
            // Game state
            const CHUNK_SIZE = 16;
            const BLOCK_SIZE = 50;
            const GRAVITY = 0.005;
            const JUMP_POWER = 0.15;
            const MOVE_SPEED = 0.1;
            
            const game = {
                player: {
                    x: 8,
                    y: 10,
                    z: 8,
                    dx: 0,
                    dy: 0,
                    dz: 0,
                    rotX: 0,
                    rotY: 0,
                    onGround: false,
                    flying: false,
                    speed: MOVE_SPEED
                },
                world: [],
                selectedBlock: 'grass',
                blockColors: {
                    grass: {top: '#7CFC00', side: '#7CFC00', bottom: '#8B4513'},
                    dirt: {top: '#8B4513', side: '#8B4513', bottom: '#8B4513'},
                    stone: {top: '#808080', side: '#808080', bottom: '#808080'},
                    wood: {top: '#A0522D', side: '#A0522D', bottom: '#A0522D'},
                    leaves: {top: '#228B22', side: '#228B22', bottom: '#228B22'},
                    bedrock: {top: '#333333', side: '#333333', bottom: '#333333'}
                },
                keys: {
                    w: false,
                    a: false,
                    s: false,
                    d: false,
                    space: false,
                    shift: false
                },
                mouse: {
                    x: 0,
                    y: 0,
                    locked: false,
                    leftPressed: false,
                    rightPressed: false
                },
                time: 0,
                lastTime: 0
            };
            
            // Generate world
            function generateWorld() {
                game.world = [];
                
                // Create a 3D array for the world
                for (let x = 0; x < CHUNK_SIZE; x++) {
                    game.world[x] = [];
                    for (let y = 0; y < CHUNK_SIZE; y++) {
                        game.world[x][y] = [];
                        for (let z = 0; z < CHUNK_SIZE; z++) {
                            // Bedrock layer
                            if (y === 0) {
                                game.world[x][y][z] = 'bedrock';
                            }
                            // Dirt/stone layer
                            else if (y < 5) {
                                game.world[x][y][z] = Math.random() < 0.8 ? 'stone' : 'dirt';
                            }
                            // Grass layer
                            else if (y === 5) {
                                game.world[x][y][z] = 'grass';
                            }
                            // Trees and features
                            else if (y === 6 && Math.random() < 0.02) {
                                // Tree trunk
                                for (let treeY = 0; treeY < 4; treeY++) {
                                    if (y + treeY < CHUNK_SIZE) {
                                        game.world[x][y + treeY][z] = 'wood';
                                    }
                                }
                                // Tree leaves
                                if (y + 4 < CHUNK_SIZE) {
                                    for (let lx = -2; lx <= 2; lx++) {
                                        for (let ly = 4; ly <= 6; ly++) {
                                            for (let lz = -2; lz <= 2; lz++) {
                                                const nx = x + lx;
                                                const ny = y + ly;
                                                const nz = z + lz;
                                                if (nx >= 0 && nx < CHUNK_SIZE && 
                                                    ny >= 0 && ny < CHUNK_SIZE && 
                                                    nz >= 0 && nz < CHUNK_SIZE && 
                                                    Math.random() < 0.7) {
                                                    game.world[nx][ny][nz] = 'leaves';
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            // Air
                            else {
                                game.world[x][y][z] = null;
                            }
                        }
                    }
                }
                
                // Place player above the ground
                game.player.x = CHUNK_SIZE / 2;
                game.player.y = 10;
                game.player.z = CHUNK_SIZE / 2;
                game.player.rotX = 0;
                game.player.rotY = 0;
            }
            
            // Draw the world
            function drawWorld() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.fillStyle = '#87CEEB'; // Sky color
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                
                // Sort blocks by distance from player (painter's algorithm)
                const blocks = [];
                
                for (let x = 0; x < CHUNK_SIZE; x++) {
                    for (let y = 0; y < CHUNK_SIZE; y++) {
                        for (let z = 0; z < CHUNK_SIZE; z++) {
                            if (game.world[x][y][z]) {
                                const dx = x - game.player.x;
                                const dy = y - game.player.y;
                                const dz = z - game.player.z;
                                const dist = dx*dx + dy*dy + dz*dz;
                                
                                // Only render blocks within view distance
                                if (dist < 100) {
                                    blocks.push({
                                        x: x,
                                        y: y,
                                        z: z,
                                        type: game.world[x][y][z],
                                        dist: dist
                                    });
                                }
                            }
                        }
                    }
                }
                
                // Sort blocks from farthest to nearest
                blocks.sort((a, b) => b.dist - a.dist);
                
                // Draw the blocks
                for (const block of blocks) {
                    drawBlock(block.x, block.y, block.z, block.type);
                }
                
                // Draw crosshair
                ctx.fillStyle = 'white';
                ctx.fillRect(canvas.width/2 - 10, canvas.height/2, 20, 2);
                ctx.fillRect(canvas.width/2, canvas.height/2 - 10, 2, 20);
            }
            
            // Draw a single block
            function drawBlock(x, y, z, type) {
                // Transform coordinates based on player position and rotation
                const dx = x - game.player.x;
                const dy = y - game.player.y;
                const dz = z - game.player.z;
                
                // Rotation around Y axis (left/right)
                const cosY = Math.cos(game.player.rotY);
                const sinY = Math.sin(game.player.rotY);
                
                const rx = dx * cosY - dz * sinY;
                const rz = dx * sinY + dz * cosY;
                
                // Rotation around X axis (up/down)
                const cosX = Math.cos(game.player.rotX);
                const sinX = Math.sin(game.player.rotX);
                
                const ry = dy * cosX - rz * sinX;
                const rz2 = dy * sinX + rz * cosX;
                
                // Perspective projection
                const scale = 400 / (rz2 + 4);
                const projX = canvas.width / 2 + rx * scale;
                const projY = canvas.height / 2 - ry * scale;
                
                // Only draw if in front of the player
                if (rz2 > 0.1) {
                    // Block size in perspective
                    const size = BLOCK_SIZE * scale;
                    
                    // Get block color
                    const color = game.blockColors[type];
                    
                    // Draw the block as a simple 2D square with shading
                    ctx.fillStyle = color.side;
                    ctx.globalAlpha = Math.min(1, 1 - rz2/30); // Fade with distance
                    ctx.fillRect(projX - size/2, projY - size/2, size, size);
                    ctx.globalAlpha = 1;
                    
                    // Add simple shading
                    if (rz < 0) {
                        ctx.fillStyle = 'rgba(0,0,0,0.3)';
                        ctx.fillRect(projX - size/2, projY - size/2, size, size);
                    }
                    if (rx < 0) {
                        ctx.fillStyle = 'rgba(0,0,0,0.2)';
                        ctx.fillRect(projX - size/2, projY - size/2, size, size);
                    }
                    if (ry < 0) {
                        ctx.fillStyle = 'rgba(0,0,0,0.1)';
                        ctx.fillRect(projX - size/2, projY - size/2, size, size);
                    }
                }
            }
            
            // Check if a block exists at coordinates
            function getBlock(x, y, z) {
                const bx = Math.floor(x);
                const by = Math.floor(y);
                const bz = Math.floor(z);
                
                if (bx >= 0 && bx < CHUNK_SIZE && 
                    by >= 0 && by < CHUNK_SIZE && 
                    bz >= 0 && bz < CHUNK_SIZE) {
                    return game.world[bx][by][bz];
                }
                return null;
            }
            
            // Set a block at coordinates
            function setBlock(x, y, z, type) {
                const bx = Math.floor(x);
                const by = Math.floor(y);
                const bz = Math.floor(z);
                
                if (bx >= 0 && bx < CHUNK_SIZE && 
                    by >= 0 && by < CHUNK_SIZE && 
                    bz >= 0 && bz < CHUNK_SIZE) {
                    game.world[bx][by][bz] = type;
                }
            }
            
            // Ray casting for block interaction
            function raycast() {
                const maxDist = 5;
                const steps = 50;
                const stepSize = maxDist / steps;
                
                // Start at player's position
                let x = game.player.x;
                let y = game.player.y;
                let z = game.player.z;
                
                // Direction vector based on player rotation
                const cosY = Math.cos(game.player.rotY);
                const sinY = Math.sin(game.player.rotY);
                const cosX = Math.cos(game.player.rotX);
                const sinX = Math.sin(game.player.rotX);
                
                const dx = sinY * cosX;
                const dy = -sinX;
                const dz = cosY * cosX;
                
                // Step through the ray
                for (let i = 0; i < steps; i++) {
                    x += dx * stepSize;
                    y += dy * stepSize;
                    z += dz * stepSize;
                    
                    const block = getBlock(x, y, z);
                    
                    if (block) {
                        return {
                            x: x,
                            y: y,
                            z: z,
                            block: block,
                            hitX: Math.floor(x),
                            hitY: Math.floor(y),
                            hitZ: Math.floor(z)
                        };
                    }
                }
                
                return null;
            }
            
            // Update player position and physics
            function updatePlayer(deltaTime) {
                // Reset acceleration
                game.player.dx = 0;
                game.player.dz = 0;
                
                // Apply gravity if not flying
                if (!game.player.flying && !game.player.onGround) {
                    game.player.dy -= GRAVITY * deltaTime;
                }
                
                // Movement keys
                if (game.keys.w) {
                    game.player.dx += Math.sin(game.player.rotY) * game.player.speed * deltaTime;
                    game.player.dz += Math.cos(game.player.rotY) * game.player.speed * deltaTime;
                }
                if (game.keys.s) {
                    game.player.dx -= Math.sin(game.player.rotY) * game.player.speed * deltaTime;
                    game.player.dz -= Math.cos(game.player.rotY) * game.player.speed * deltaTime;
                }
                if (game.keys.a) {
                    game.player.dx -= Math.cos(game.player.rotY) * game.player.speed * deltaTime;
                    game.player.dz += Math.sin(game.player.rotY) * game.player.speed * deltaTime;
                }
                if (game.keys.d) {
                    game.player.dx += Math.cos(game.player.rotY) * game.player.speed * deltaTime;
                    game.player.dz -= Math.sin(game.player.rotY) * game.player.speed * deltaTime;
                }
                
                // Flying and jumping
                if (game.player.flying) {
                    if (game.keys.space) {
                        game.player.dy = game.player.speed * deltaTime;
                    }
                    if (game.keys.shift) {
                        game.player.dy = -game.player.speed * deltaTime;
                    }
                } else if (game.keys.space && game.player.onGround) {
                    game.player.dy = JUMP_POWER * deltaTime;
                    game.player.onGround = false;
                }
                
                // Apply velocities
                const newX = game.player.x + game.player.dx;
                const newY = game.player.y + game.player.dy;
                const newZ = game.player.z + game.player.dz;
                
                // Collision detection (very simple)
                game.player.onGround = false;
                
                // Check X collision
                if (!getBlock(newX, game.player.y, game.player.z)) {
                    game.player.x = newX;
                }
                
                // Check Y collision
                if (!getBlock(game.player.x, newY, game.player.z)) {
                    game.player.y = newY;
                } else {
                    // If moving down and collided, we're on the ground
                    if (game.player.dy < 0) {
                        game.player.onGround = true;
                    }
                    game.player.dy = 0;
                }
                
                // Check Z collision
                if (!getBlock(game.player.x, game.player.y, newZ)) {
                    game.player.z = newZ;
                }
                
                // Keep player within world bounds
                game.player.x = Math.max(0.5, Math.min(CHUNK_SIZE - 0.5, game.player.x));
                game.player.y = Math.max(0.5, Math.min(CHUNK_SIZE - 0.5, game.player.y));
                game.player.z = Math.max(0.5, Math.min(CHUNK_SIZE - 0.5, game.player.z));
            }
            
            // Handle mouse look
            function handleMouseMove(e) {
                if (game.mouse.locked) {
                    game.player.rotY += e.movementX * 0.003;
                    game.player.rotX += e.movementY * 0.003;
                    
                    // Limit up/down rotation to prevent flipping
                    game.player.rotX = Math.max(-Math.PI/2 + 0.1, Math.min(Math.PI/2 - 0.1, game.player.rotX));
                }
            }
            
            // Handle mouse clicks
            function handleMouseDown(e) {
                if (game.mouse.locked) {
                    if (e.button === 0) { // Left click
                        game.mouse.leftPressed = true;
                        
                        // Break block
                        const hit = raycast();
                        if (hit && hit.block !== 'bedrock') {
                            setBlock(hit.hitX, hit.hitY, hit.hitZ, null);
                        }
                    } else if (e.button === 2) { // Right click
                        game.mouse.rightPressed = true;
                        
                        // Place block
                        const hit = raycast();
                        if (hit) {
                            // Calculate placement position (simple approach)
                            const dx = hit.x - hit.hitX - 0.5;
                            const dy = hit.y - hit.hitY - 0.5;
                            const dz = hit.z - hit.hitZ - 0.5;
                            
                            let nx = hit.hitX;
                            let ny = hit.hitY;
                            let nz = hit.hitZ;
                            
                            // Determine which face was hit
                            if (Math.abs(dx) > Math.abs(dy) && Math.abs(dx) > Math.abs(dz)) {
                                nx += dx > 0 ? 1 : -1;
                            } else if (Math.abs(dy) > Math.abs(dx) && Math.abs(dy) > Math.abs(dz)) {
                                ny += dy > 0 ? 1 : -1;
                            } else {
                                nz += dz > 0 ? 1 : -1;
                            }
                            
                            // Check if the new position is within bounds and empty
                            if (nx >= 0 && nx < CHUNK_SIZE &&
                                ny >= 0 && ny < CHUNK_SIZE &&
                                nz >= 0 && nz < CHUNK_SIZE &&
                                !getBlock(nx, ny, nz)) {
                                
                                // Check if not overlapping with player
                                const dx = nx - game.player.x;
                                const dy = ny - game.player.y;
                                const dz = nz - game.player.z;
                                const distSq = dx*dx + dy*dy + dz*dz;
                                
                                if (distSq > 1) {
                                    setBlock(nx, ny, nz, game.selectedBlock);
                                }
                            }
                        }
                    }
                } else {
                    // Request pointer lock when clicking on the canvas
                    canvas.requestPointerLock = canvas.requestPointerLock || canvas.mozRequestPointerLock;
                    canvas.requestPointerLock();
                }
            }
            
            function handleMouseUp(e) {
                if (e.button === 0) { // Left click
                    game.mouse.leftPressed = false;
                } else if (e.button === 2) { // Right click
                    game.mouse.rightPressed = false;
                }
            }
            
            // Pointer lock change handler
            function handlePointerLockChange() {
                if (document.pointerLockElement === canvas ||
                    document.mozPointerLockElement === canvas) {
                    game.mouse.locked = true;
                } else {
                    game.mouse.locked = false;
                }
            }
            
            // Keyboard input handlers
            function handleKeyDown(e) {
                switch(e.code) {
                    case 'KeyW': game.keys.w = true; break;
                    case 'KeyA': game.keys.a = true; break;
                    case 'KeyS': game.keys.s = true; break;
                    case 'KeyD': game.keys.d = true; break;
                    case 'Space': game.keys.space = true; break;
                    case 'ShiftLeft': game.keys.shift = true; break;
                }
            }
            
            function handleKeyUp(e) {
                switch(e.code) {
                    case 'KeyW': game.keys.w = false; break;
                    case 'KeyA': game.keys.a = false; break;
                    case 'KeyS': game.keys.s = false; break;
                    case 'KeyD': game.keys.d = false; break;
                    case 'Space': game.keys.space = false; break;
                    case 'ShiftLeft': game.keys.shift = false; break;
                    case 'KeyF': game.player.flying = !game.player.flying; break;
                }
            }
            
            // Game loop
            function gameLoop(timestamp) {
                // Calculate delta time
                const deltaTime = timestamp - game.lastTime;
                game.lastTime = timestamp;
                
                // Update
                updatePlayer(deltaTime);
                
                // Render
                drawWorld();
                
                // Loop
                requestAnimationFrame(gameLoop);
            }
            
            // Event listeners for controls
            canvas.addEventListener('mousemove', handleMouseMove);
            canvas.addEventListener('mousedown', handleMouseDown);
            window.addEventListener('mouseup', handleMouseUp);
            document.addEventListener('keydown', handleKeyDown);
            document.addEventListener('keyup', handleKeyUp);
            document.addEventListener('pointerlockchange', handlePointerLockChange);
            document.addEventListener('mozpointerlockchange', handlePointerLockChange);
            
            // Prevent context menu on right-click
            canvas.addEventListener('contextmenu', e => e.preventDefault());
            
            // Inventory selection
            inventoryItems.forEach(item => {
                item.addEventListener('click', () => {
                    inventoryItems.forEach(i => i.classList.remove('selected'));
                    item.classList.add('selected');
                    game.selectedBlock = item.getAttribute('data-block');
                });
            });
            
            // Reset world button
            resetBtn.addEventListener('click', () => {
                generateWorld();
            });
            
            // Fullscreen toggle
            fullscreenBtn.addEventListener('click', () => {
                const demoContainer = document.getElementById('minecraft-demo');
                if (!document.fullscreenElement) {
                    if (demoContainer.requestFullscreen) {
                        demoContainer.requestFullscreen();
                    } else if (demoContainer.mozRequestFullScreen) {
                        demoContainer.mozRequestFullScreen();
                    } else if (demoContainer.webkitRequestFullscreen) {
                        demoContainer.webkitRequestFullscreen();
                    } else if (demoContainer.msRequestFullscreen) {
                        demoContainer.msRequestFullscreen();
                    }
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitExitFullscreen) {
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) {
                        document.msExitFullscreen();
                    }
                }
            });
            
            // Initialize game
            generateWorld();
            game.lastTime = performance.now();
            requestAnimationFrame(gameLoop);
        });
    </script>
</body>
</html>