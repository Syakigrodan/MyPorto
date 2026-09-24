@extends('layouts.app')

@section('content')
    {{-- ============ HERO ============ --}}
    <section id="home" class="hero">
        <div class="liquid-reveal" data-after="{{ config('portfolio.hero.afterSrc') }}">
            <img data-before src="{{ config('portfolio.hero.beforeSrc') }}" alt="{{ config('portfolio.brand') }} showcase">
            <canvas aria-hidden="true"></canvas>
        </div>
        <div class="hero-vignette"></div>

        <div class="hero-watermark" aria-hidden="true">{{ strtoupper(config('portfolio.brand')) }}</div>

        <div class="hero-grid shell">
            <div class="hero-col-left">
                <p class="eyebrow hero-reveal reveal" style="transition-delay:200ms">{{ config('portfolio.hero.eyebrow') }}</p>

                <h1 class="hero-h1">
                    <span class="reveal-line"><span style="transition-delay:250ms">Hi, I'm</span></span>
                    <span class="reveal-line"><span style="transition-delay:370ms">{{ config('portfolio.name') }}</span></span>
                </h1>

                <p class="hero-role hero-reveal reveal" style="transition-delay:500ms">
                    <span class="typed-role" id="typed-role" data-typing="{{ json_encode(config('portfolio.roles')) }}">{{ config('portfolio.role') }}</span>
                </p>

                <p class="hero-bio hero-reveal reveal" style="transition-delay:580ms">{{ config('portfolio.tagline') }}</p>

                <div class="cta-row hero-reveal reveal" style="transition-delay:660ms">
                    <a class="pill-btn pill-btn--dark" href="#portfolio">
                        <span class="pill-spring">
                            <span class="pill-inner pill-inner--arrow">
                                Explore Work
                                <span class="pill-badge pill-badge--right">
                                    <svg style="width:1em;height:1em" aria-hidden="true"><use href="#icon-arrow-right"/></svg>
                                </span>
                            </span>
                        </span>
                    </a>
                    <a class="pill-btn pill-btn--outline" href="{{ config('portfolio.resume_url') }}" download>
                        <span class="pill-spring">
                            <span class="pill-inner pill-inner--plain">Download CV 📥</span>
                        </span>
                    </a>
                </div>

                <div class="hero-socials hero-reveal reveal" style="transition-delay:740ms">
                    <span class="hero-socials-label">Follow me</span>
                    <ul class="hero-socials-list">
                        @foreach (['instagram', 'github', 'linkedin'] as $key)
                            @if (config("portfolio.socials.$key"))
                                <li>
                                    <a class="social-btn" href="{{ config("portfolio.socials.$key") }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($key) }}" title="{{ ucfirst($key) }}">
                                        <svg style="width:1em;height:1em" aria-hidden="true"><use href="#icon-{{ $key }}"/></svg>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="hero-col-right">
                <div class="hero-card hero-reveal reveal reveal-card" style="transition-delay:400ms" data-player data-tracks="{{ json_encode(config('portfolio.music')) }}">
                    <div class="hero-card-row">
                        <div class="card-tile" data-player-tile aria-hidden="true">
                            <svg class="player-tile-icon" style="width:1em;height:1em"><use href="#icon-music"/></svg>
                            <img class="player-tile-img" data-player-img alt="" hidden>
                        </div>
                        <div class="card-panel">
                            <div>
                                <p class="card-caption">Now playing</p>
                                <div class="card-slot">
                                    @foreach (config('portfolio.music') as $i => $track)
                                        <span class="card-title {{ $i === 0 ? 'is-active' : '' }}">{{ $track['title'] }}</span>
                                    @endforeach
                                </div>
                                <p class="player-artist" data-player-artist></p>
                                <div class="player-progress">
                                    <div class="player-time">
                                        <span data-player-current>0:00</span>
                                        <span data-player-duration>0:00</span>
                                    </div>
                                    <div class="player-track"><div class="player-fill" data-player-fill></div></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="card-dots" role="tablist" aria-label="Tracks">
                                    @foreach (config('portfolio.music') as $i => $track)
                                        <button class="card-dot {{ $i === 0 ? 'is-active' : '' }}" type="button" aria-label="Track {{ $i + 1 }}"></button>
                                    @endforeach
                                </div>
                                <div class="card-nav">
                                    <button type="button" data-prev aria-label="Previous">
                                        <svg style="width:1em;height:1em;transform:rotate(180deg)" aria-hidden="true"><use href="#icon-arrow-right"/></svg>
                                    </button>
                                    <button type="button" class="card-play" data-toggle-play aria-label="Play">
                                        <svg class="icon-play" style="width:1em;height:1em" aria-hidden="true"><use href="#icon-play"/></svg>
                                        <svg class="icon-pause" style="width:1em;height:1em" aria-hidden="true"><use href="#icon-pause"/></svg>
                                    </button>
                                    <button type="button" data-next aria-label="Next">
                                        <svg style="width:1em;height:1em" aria-hidden="true"><use href="#icon-arrow-right"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <audio data-player-audio preload="none"></audio>
                </div>

                <div class="hero-visual hero-reveal reveal reveal-card" style="transition-delay:550ms">
                    <div class="hero-visual-rings" aria-hidden="true">
                        <span class="hero-visual-ring hero-visual-ring--outer"></span>
                        <span class="hero-visual-ring hero-visual-ring--inner"></span>
                        <span class="hero-visual-badge-pill">
                            <svg style="width:1em;height:1em" aria-hidden="true"><use href="#icon-spark"/></svg>
                            {{ config('portfolio.role') }}
                        </span>
                    </div>

                    @foreach (config('portfolio.hero.badges') as $index => $badge)
                        <div class="badge-float badge-float--{{ $index }}" style="animation-delay:{{ $index * -1.4 }}s">
                            <span class="badge-float-icon">
                                <svg style="width:1em;height:1em" aria-hidden="true"><use href="#icon-{{ $badge['icon'] }}"/></svg>
                            </span>
                            <span class="badge-float-text">
                                <strong>{{ $badge['value'] }}</strong>
                                <span>{{ $badge['label'] }}</span>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="hero-status shell hero-reveal reveal" style="transition-delay:900ms">
            <span>{{ config('portfolio.hero.working_since') }}</span>
            <span class="hero-status-center">Remote-first, worldwide</span>
            <span class="hero-status-right"><span>Scroll to explore</span> ↓</span>
        </div>
    </section>

    {{-- ============ ABOUT ============ --}}
    <section id="about" class="about-section">
        <div class="shell about-grid">
            <div class="about-globe-block">
                <div class="about-globe" aria-hidden="true">
                    <svg style="width:1em;height:1em"><use href="#icon-globe"/></svg>
                </div>
                <p class="eyebrow reveal">The Studio</p>
                <div class="distributed reveal reveal-up">
                    <svg style="width:1em;height:1em" aria-hidden="true"><use href="#icon-globe"/></svg>
                    <span>A distributed team building across every time zone.</span>
                </div>
            </div>

            <div class="about-statement">
                <h2 class="about-h2">
                    <span data-split-words>{{ config('portfolio.about') }}</span>
                    <span data-split-words class="muted">{{ config('portfolio.about_highlight') }}</span>
                </h2>

                <div class="about-foot reveal reveal-up">
                    <div>
                        <p class="about-soc-label">Find us online</p>
                        <div class="socials">
                            @php
                                $socials = collect(config('portfolio.socials'))->take(3);
                            @endphp
                            @foreach ($socials as $label => $url)
                                <a class="social-chip {{ $loop->first ? 'social-chip--accent' : 'social-chip--soft' }}" href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($label) }}">
                                    @if ($loop->first)
                                        <svg style="width:1em;height:1em" aria-hidden="true"><use href="#icon-x"/></svg>
                                    @else
                                        <svg style="width:1em;height:1em" aria-hidden="true"><use href="#icon-circle-dot"/></svg>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <a class="pill-btn pill-btn--outline" href="#about">
                        <span class="pill-spring">
                            <span class="pill-inner pill-inner--arrow">
                                About Us
                                <span class="pill-badge pill-badge--up">
                                    <svg style="width:1em;height:1em" aria-hidden="true"><use href="#icon-arrow-up-right"/></svg>
                                </span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ CREATEBAND ============ --}}
    <section class="band">
        <ul class="shell band-list">
            <li class="band-item reveal reveal-up" style="transition-delay:0ms">
                <span class="band-tile band-tile--light">We</span>
            </li>
            <li class="band-item reveal reveal-up" style="transition-delay:120ms">
                <span class="band-tile band-tile--accent">Build</span>
            </li>
            <li class="band-item reveal reveal-up" style="transition-delay:240ms">
                <span class="band-tile band-tile--dark" aria-hidden="true">
                    <svg style="width:1em;height:1em"><use href="#icon-arrow-right"/></svg>
                </span>
            </li>
            <li class="band-item reveal reveal-up" style="transition-delay:360ms">
                <span class="band-tile band-tile--ghost">Better</span>
            </li>
        </ul>
    </section>

    {{-- ============ PORTFOLIO / WORKS ============ --}}
    <section id="portfolio" class="works-section">
        <div class="shell" data-tabs>
            <div class="works-head">
                <span class="works-eyebrow pill reveal"><span class="dot"></span> Portfolio</span>
                <h2 class="works-h2">
                    <span class="reveal-line"><span style="transition-delay:120ms">Selected Work</span></span>
                </h2>
            </div>

            <div class="tabs reveal" role="tablist" aria-label="Portfolio sections" style="transition-delay:100ms">
                <button class="tab-btn is-active" type="button" data-tab="projects" role="tab" aria-selected="true">Projects</button>
                <button class="tab-btn" type="button" data-tab="stack" role="tab" aria-selected="false">Tech Stack</button>
                <button class="tab-btn" type="button" data-tab="certificates" role="tab" aria-selected="false">Certificates</button>
            </div>

            {{-- Projects --}}
            <div class="works-panel is-active" data-panel="projects" role="tabpanel">
                @if ($projects->isNotEmpty())
                    <ul class="works-grid">
                        @foreach ($projects as $index => $project)
                            @php
                                $projectUrl = $project->link ?? $project->github ?? '#';
                                $projectYear = $project->year ?? $project->created_at->year;
                                $projectCategory = $project->category ?? 'Project';
                            @endphp
                            <li class="reveal reveal-up-lg" style="transition-delay:{{ $index * 90 }}ms">
                                <a class="work-card" href="{{ $projectUrl }}" target="_blank" rel="noopener">
                                    <div class="work-meta">
                                        <span>{{ $projectCategory }} — {{ $projectYear }}</span>
                                        <span class="work-badge" aria-hidden="true">
                                            <svg style="width:1em;height:1em"><use href="#icon-arrow-up-right"/></svg>
                                        </span>
                                    </div>
                                    <div class="work-watermark" aria-hidden="true">
                                        <svg style="width:1em;height:1em"><use href="#icon-spark"/></svg>
                                        <span class="reg">®</span>
                                    </div>
                                    <div class="work-body">
                                        <h3 class="work-title">{{ $project->title }}</h3>
                                        <p class="work-desc">{{ $project->description }}</p>
                                        @if (!empty($project->tech_stack))
                                            <div class="work-tags">
                                                @foreach (array_slice($project->tech_stack, 0, 3) as $tech)
                                                    <span class="tag-chip">{{ $tech }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="modal-note">Projects coming soon.</p>
                @endif
            </div>

            {{-- Tech Stack --}}
            <div class="works-panel" data-panel="stack" role="tabpanel">
                @php $groupedSkills = $skills->groupBy('category'); @endphp
                @if ($skills->isNotEmpty())
                    <div class="stack-groups">
                        @foreach (App\Models\Skill::CATEGORIES as $category)
                            @if ($groupedSkills->has($category))
                                <div class="stack-group reveal" style="transition-delay:80ms">
                                    <h3 class="stack-group-title">{{ $category }}</h3>
                                    <div class="stack-grid">
                                        @foreach ($groupedSkills->get($category) as $skill)
                                            <span class="stack-badge">
                                                <span class="bar" aria-hidden="true"></span>
                                                {{ $skill->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <p class="modal-note">Tech stack coming soon.</p>
                @endif
            </div>

            {{-- Certificates --}}
            <div class="works-panel" data-panel="certificates" role="tabpanel">
                @if ($certificates->isNotEmpty())
                    <div class="cert-grid">
                        @foreach ($certificates as $index => $certificate)
                            <a class="cert-card reveal reveal-up" href="{{ $certificate->credential_url ?: '#' }}" target="_blank" rel="noopener" style="transition-delay:{{ $index * 80 }}ms">
                                <span class="cert-cat">{{ $certificate->category }}</span>
                                <h3 class="cert-title">{{ $certificate->title }}</h3>
                                <p class="cert-issuer">{{ $certificate->issuer }}</p>
                                @if ($certificate->issued_date)
                                    <p class="cert-date">Issued {{ $certificate->issued_date->format('M Y') }}</p>
                                @endif
                                @if ($certificate->description)
                                    <p class="cert-desc">{{ $certificate->description }}</p>
                                @endif
                                <div class="cert-foot">
                                    <span class="cert-verify">
                                        <svg style="width:1em;height:1em" aria-hidden="true"><use href="#icon-check"/></svg>
                                        <span>View credential</span>
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="modal-note">Certificates coming soon.</p>
                @endif
            </div>
        </div>
    </section>

    {{-- ============ STATS ============ --}}
    <section class="stats-section">
        <div class="shell">
            <div class="stats-panel reveal reveal-up-lg reveal-scale" data-stats>
                <p class="eyebrow eyebrow--light">By the numbers</p>
                <h2 class="stats-h2">
                    <span class="reveal-line"><span style="transition-delay:120ms">Proof in the work, not the words.</span></span>
                </h2>

                <ul class="stats-grid">
                    @foreach ($stats as $index => $stat)
                        <li class="stat-item" style="transition-delay:{{ $index * 90 }}ms">
                            <p class="stat-number">
                                <span class="stat-value" data-target="{{ $stat['value'] }}">0</span><span class="stat-suffix">{{ $stat['suffix'] }}</span>
                            </p>
                            <p class="stat-label">{{ $stat['label'] }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection